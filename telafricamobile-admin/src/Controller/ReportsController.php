<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;
use Cake\Core\Configure;

class ReportsController extends AppController{

	public function index() {

		$allowedAccountMans = ['admin', 'sales', 'regular'];
		$UsersTable = TableRegistry::get('users');
		$query = $UsersTable->find('list', [
			'keyField' => 'id',
			'valueField' => 'email',
			'conditions' => ['users.role IN' => $allowedAccountMans, 'users.activate' => 1],
			'order' => ['email' => 'ASC']
		]);
		//debug($query);die;
		$accounts = $query->toArray();
		$this->set('accounts', $accounts);

    }

    
    public function getstarts(){

    	if($this->request->is('ajax')){

	    	$this->autoRender = false;
	    	$conn = ConnectionManager::get('default');

	    	$account = ($this->request->query['account'] ? $this->request->query['account'] : $this->Auth->user('id'));
	    	/**
		    $query = "SELECT datetosend, count(msisdn) AS SMSsPerMonth 
		    FROM sms
			WHERE user_id = ".$account." 
			AND datetosend BETWEEN '".$this->request->query['startdate']." 00:00:00' AND '".$this->request->query['enddate']." 23:59:59'
			GROUP BY MONTH(datetosend) ORDER BY datetosend";

			$SMSsPerMonth = $conn->execute($query)->fetchAll('assoc');
			$this->set('SMSsPerMonth', $SMSsPerMonth);
			**/
			$this->request->query['startdate'] = date('Y-m-d', strtotime($this->request->query['startdate']));
			$this->request->query['enddate'] = date('Y-m-d', strtotime($this->request->query['enddate']));

	    	$SMSTable = TableRegistry::get('sms');
			
			$TotalDeliveredSMSs = $SMSTable->find()
				->where(['sms.user_id =' => $account,
					[
						'sms.datetosend >=' => $this->request->query['startdate'].' 00:00:00', 
						'sms.datetosend <=' => $this->request->query['enddate'].' 23:59:59'
					]
				])
			 	->count();
			//$this->set('TotalDeliveredSMSs', $TotalDeliveredSMSs); 

			//$this->set('Date', $date);

			$LastSentSMSs = $SMSTable->find()
				->where(['sms.user_id =' => $account,
					[
						'sms.datetosend >=' => $this->request->query['startdate'].' 00:00:00', 
						'sms.datetosend <=' => $this->request->query['enddate'].' 23:59:59'
					]
				])
			 	->order(['sms.datetosend' => 'DESC'])
			 	->all();
			$UsersTable = TableRegistry::get('users');
			$query = $UsersTable->find('all', [
				'conditions' => ['users.id =' => $account]
			]);
			
			$user = $query->first();

		 	$DeliveredSMSs= array();
		 	$QueuedSMSs= array();
		 	$ConfirmedSMSs= array();
		 	$PendingSMSs = array();

		 	$csv = "MSISDN,Content,Status,Date Sent,Sender\n";
		 	$download  = '';

			foreach ($LastSentSMSs as $LastSentSMS) {
		    
			    if($LastSentSMS->status == 'D'){
			        $DeliveredSMSs[] = $LastSentSMS->msisdn;
			    }

			    if($LastSentSMS->status == 'Q'){
			        $QueuedSMSs[] = $LastSentSMS->msisdn;
			    }

			    if($LastSentSMS->status == 'S'){
			        $SubmittedSMSs[] = $LastSentSMS->msisdn;
			    }

			    if($LastSentSMS->status == 'P'){
			        $PendingSMSs[] = $LastSentSMS->msisdn;
			    }

			    switch ($LastSentSMS->status) {
                            
                    case 'P':
                        $status = 'Pending';
                        break;
                    case 'S':
                        $status = 'Submitted';
                        break;
                    case 'D':
                        $status = 'Delivered';  
                        break;                              
                    default:
                        $status = 'Queued';
                        break;
                }              


			    $CSVArray[] = $LastSentSMS->msisdn;
			    $CSVArray[] = $LastSentSMS->content;
			    $CSVArray[] = $status;
			    $CSVArray[] = date('d/m/Y H:i:s', strtotime($LastSentSMS->datetosend));
			   	$CSVArray[] = $user->email;
			   	$csv .= join(',', $CSVArray)."\n";

			   	unset($CSVArray);
			}


			$graphs = '<script src="/telafricamobile-admin/js/Chart.min.js"></script><div style="width:90%;height:400px">
                <div id="legend" style="width:200px"></div>
               	 <canvas id="myChart" style="width:100%; height:80%"></canvas>
	            </div>

	            <script type="text/javascript">               
	                            
	                // Get the context of the canvas element we want to select
	                var ctx = document.getElementById("myChart").getContext("2d");

	                // Chart data and style
	                var options = {

	                    //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
	                    scaleBeginAtZero : true,

	                    //Boolean - Whether grid lines are shown across the chart
	                    scaleShowGridLines : true,

	                    //String - Colour of the grid lines
	                    scaleGridLineColor : "rgba(0,0,0,.05)",

	                    //Number - Width of the grid lines
	                    scaleGridLineWidth : 1,

	                    //Boolean - Whether to show horizontal lines (except X axis)
	                    scaleShowHorizontalLines: true,

	                    //Boolean - Whether to show vertical lines (except Y axis)
	                    scaleShowVerticalLines: true,

	                    //Boolean - If there is a stroke on each bar
	                    barShowStroke : true,

	                    //Number - Pixel width of the bar stroke
	                    barStrokeWidth : 2,

	                    //Number - Spacing between each of the X value sets
	                    barValueSpacing : 5,

	                    //Number - Spacing between data sets within X values
	                    barDatasetSpacing : 1,

	                    //String - A legend template
	                    legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>"

	                }

	                var data = {
	                    labels: [\'Pending\', \'Submitted\', \'Delivered\', \'Queued\'],
	                    datasets: [
	                        {
	                            label: "SMSs Sent",
	                            fillColor: "rgba(151,187,205,0.5)",
	                            strokeColor: "rgba(151,187,205,0.8)",
	                            highlightFill: "rgba(151,187,205,0.75)",
	                            highlightStroke: "rgba(151,187,205,1)",
	                            data: ['.count($PendingSMSs).', '.count($SubmittedSMSs).', '.count($DeliveredSMSs).', '.count($QueuedSMSs).']
	                        },
	                      
	                    ]
	                };

	                var myBarChart = new Chart(ctx).Bar(data, options);
	                document.getElementById("legend").innerHTML = myBarChart.generateLegend();
	            </script>';

			#create the CSV file
			$system_path = Configure::read('UPLOADFOLDER');
			$filename_md5 = md5($account.date("YmdHis"));
			
			$fh = fopen($system_path.$filename_md5.'.csv','w');
			fwrite($fh,$csv);
			fclose($fh);
			
				if (exec('/usr/bin/zip -j '.$system_path.$filename_md5.'.zip '.$system_path.$filename_md5.'.csv')){

					$download = '<br><br><a href="uploads/'.$filename_md5.'.zip">Click here to download a compressed CSV file!</a><br><br>';
				}else{
					$download = '<br><br>Could not create ZIP file.<br><br>';    
				}
			}
			unlink($system_path.$filename_md5.'.csv');
			

			$message['error'] = false;
			$message['message']= '<div class="six columns panel reportsSummary">
            <h4>Delivery Reports</h4>
            <ul>
            	<li>Total Sent SMSs between '.date('d F Y', strtotime($this->request->query['startdate'])).' and '.date('d F Y', strtotime($this->request->query['enddate'])).' are <b>'.$TotalDeliveredSMSs.'</b></li>
                <li>Messages Delivered: <span>'.(count($DeliveredSMSs) ? count($DeliveredSMSs) : "0").'</span></li>
                <li>Messages Pending: <span>'.(count($PendingSMSs) ? count($PendingSMSs) : "0").'</span></li>
                <li>Messages Submitted: <span>'.(count($SubmittedSMSs) ? count($SubmittedSMSs) : "0").'</span></li>
                <li>Messages Queued: <span>'.(count($QueuedSMSs) ? count($QueuedSMSs) : "0").'</span></li>
                <li>'.$graphs.'</li>
                <li>'.($TotalDeliveredSMSs != 0 ? $download : "").'</li>
            </ul>
       		</div>';

			//$this->set('LastSentSMSs', $LastSentSMSs);

			echo json_encode($message);
		}
    }
//}