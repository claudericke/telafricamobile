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

	    $this->set('_serialize', ['SMSsPerMonth', 'credits']);
    
    }

}

?>