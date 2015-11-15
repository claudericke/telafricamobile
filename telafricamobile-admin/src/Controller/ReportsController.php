<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;

class ReportsController extends AppController{

	public function index() {

    }

    
    public function getstarts(){

    	if($this->request->is('ajax')) {

	    	$this->autoRender = false;
	    	$conn = ConnectionManager::get('default');
	    	/**
		    $query = "SELECT datetosend, count(msisdn) AS SMSsPerMonth 
		    FROM sms
			WHERE user_id = ".$this->Auth->user('id')." 
			AND datetosend BETWEEN '".$this->request->query['startdate']." 00:00:00' AND '".$this->request->query['enddate']." 23:59:59'
			GROUP BY MONTH(datetosend) ORDER BY datetosend";

			$SMSsPerMonth = $conn->execute($query)->fetchAll('assoc');
			$this->set('SMSsPerMonth', $SMSsPerMonth);
			**/
			$this->request->query['startdate'] = date('Y-m-d', strtotime($this->request->query['startdate']));
			$this->request->query['enddate'] = date('Y-m-d', strtotime($this->request->query['enddate']));

	    	$SMSTable = TableRegistry::get('sms');
			
			$TotalDeliveredSMSs = $SMSTable->find()
				->where(['sms.user_id =' => $this->Auth->user('id'),
						[
							'sms.datetosend >=' => $this->request->query['startdate'].' 00:00:00', 
							'sms.datetosend <=' => $this->request->query['enddate'].' 23:59:59'
						]
					])
			 	->count();
			//$this->set('TotalDeliveredSMSs', $TotalDeliveredSMSs); 

			//$this->set('Date', $date);

			$LastSentSMSs = $SMSTable->find()
				->where(['sms.user_id =' => $this->Auth->user('id'),
					[
						'sms.datetosend >=' => $this->request->query['startdate'].' 00:00:00', 
						'sms.datetosend <=' => $this->request->query['enddate'].' 23:59:59'
					]
				])
			 	->order(['sms.status' => 'DESC'])
			 	->all();
			 	//debug($LastSentSMSs);
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
			}


			$message['error'] = false;
			$message['message']= '<div class="six columns panel reportsSummary">
            <h4>Delivery Reports</h4>
            <ul>
            	<li>Total Sent SMSs between '.date('d F Y', strtotime($this->request->query['startdate'])).' and '.date('d F Y', strtotime($this->request->query['enddate'])).' are <b>'.$TotalDeliveredSMSs.'</b></li>
                <li>Messages Delivered: <span>'.(count($DeliveredSMSs) ? count($DeliveredSMSs) : "0").'</span></li>
                <li>Messages Pending: <span>'.(count($PendingSMSs) ? count($PendingSMSs) : "0").'</span></li>
                <li>Messages Confirmed: <span>'.(count($ConfirmedSMSs) ? count($ConfirmedSMSs) : "0").'</span></li>
                <li>Messages Queued: <span>'.(count($QueuedSMSs) ? count($QueuedSMSs) : "0").'</span></li>
            </ul>
       		</div>';

			//$this->set('LastSentSMSs', $LastSentSMSs);

			echo json_encode($message);
		}
    }
}