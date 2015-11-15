<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;

class DashboardsController extends AppController{

	public function index(){

    	$creditsTable = TableRegistry::get('Credits');
		$credits = $creditsTable->find()
    		->select(['id','creditValue'])
		 	->where(['Credits.user_id =' => $this->Auth->user('id')])
		 	->first();
		$this->set('credits', $credits); 

		$conn = ConnectionManager::get('default');

	    $query = "SELECT datetosend, count(msisdn) AS SMSsPerMonth 
	    FROM sms
		WHERE user_id = ".$this->Auth->user('id')." 
		GROUP BY MONTH(datetosend) ORDER BY datetosend";

		$SMSsPerMonth = $conn->execute($query)->fetchAll('assoc');
		$this->set('SMSsPerMonth', $SMSsPerMonth);

    	$SMSTable = TableRegistry::get('sms');

		$TotalDeliveredSMSs = $SMSTable->find()
			->where(['sms.status =' => 'D', 'sms.user_id =' => $this->Auth->user('id')])
		 	->count();
		$this->set('TotalDeliveredSMSs', $TotalDeliveredSMSs); 

		$LastSentDate = $SMSTable->find()
			->select(['datetosend'])
		 	->where(['sms.user_id =' => $this->Auth->user('id')])
		 	->order(['sms.datetosend' => 'DESC'])
		 	->first();

		$date = date('Y-m-d',strtotime($LastSentDate->datetosend));

		$this->set('Date', $date);

		$LastSentSMSs = $SMSTable->find()
			->where(['sms.user_id =' => $this->Auth->user('id'),
				[
					'sms.datetosend >=' => $date.' 00:00:00', 
					'sms.datetosend <=' => $date.' 23:59:59'
				]
			])
		 	->order(['sms.status' => 'DESC'])
		 	->all();

		$this->set('LastSentSMSs', $LastSentSMSs);

	    $this->set('_serialize', ['SMSsPerMonth', 'credits', 'TotalDeliveredSMSs', 'Date', 'LastSentSMSs']);
    
    }

}

?>