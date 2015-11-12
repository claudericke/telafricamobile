<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

class DashboardsController extends AppController{

	public function index(){

    	$creditsTable = TableRegistry::get('Credits');
		$credits = $creditsTable->find()
    		->select(['id','creditValue'])
		 	->where(['Credits.user_id =' => $this->Auth->user('id')])
		 	->first();
		$this->set('credits', $credits); 	
	    $this->set('_serialize', ['credits']);
    
    }

}

?>