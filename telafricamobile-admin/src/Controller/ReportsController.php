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

    	if($this->request->is('ajax')) {

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

			    if($LastSentSMS->status == 'C'){
			        $ConfirmedSMSs[] = $LastSentSMS->msisdn;
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

			#create the CSV file
			$system_path = Configure::read('UPLOADFOLDER');
			$filename_md5 = md5($account.date("YmdHis"));
			
			$fh = fopen($system_path.$filename_md5.'.csv','w');
			fwrite($fh,$csv);
			fclose($fh);
			
			if (exec('/usr/bin/zip -j '.$system_path.$filename_md5.'.zip '.$system_path.$filename_md5.'.csv')){
				$download = '<br><br><a href="uploads/'.$filename_md5.'.zip">Click here to download a compressed CSV file!</a><br><br>';
			}
			else
			{
				$download = '<br><br>Could not create ZIP file.<br><br>';    
			}
			unlink($system_path.$filename_md5.'.csv');
			

			$message['error'] = false;
			$message['message']= '<div class="six columns panel reportsSummary">
            <h4>Delivery Reports</h4>
            <ul>
            	<li>Total Sent SMSs between '.date('d F Y', strtotime($this->request->query['startdate'])).' and '.date('d F Y', strtotime($this->request->query['enddate'])).' are <b>'.$TotalDeliveredSMSs.'</b></li>
                <li>Messages Delivered: <span>'.(count($DeliveredSMSs) ? count($DeliveredSMSs) : "0").'</span></li>
                <li>Messages Pending: <span>'.(count($PendingSMSs) ? count($PendingSMSs) : "0").'</span></li>
                <li>Messages Confirmed: <span>'.(count($ConfirmedSMSs) ? count($ConfirmedSMSs) : "0").'</span></li>
                <li>Messages Queued: <span>'.(count($QueuedSMSs) ? count($QueuedSMSs) : "0").'</span></li>
                <li>'.$download.'</li>
            </ul>
       		</div>';

			//$this->set('LastSentSMSs', $LastSentSMSs);

			echo json_encode($message);
		}
    }
}