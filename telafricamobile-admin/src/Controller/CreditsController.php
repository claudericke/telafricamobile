<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class CreditsController extends AppController{

	public function initialize(){
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }
	public function add() {

	    $cred = $this->Credits->newEntity();

	    if($this->request->is('ajax')) {
	    	$this->autoRender = false;
	    	$user_id = $this->request->query['user_id'];
	    	$query = $this->Credits->findByUser_id($user_id);
	    	$user_credits = $query->first();
	    	
	    	$creditvalue = $user_credits->creditvalue;

	    	if($creditvalue){
	    		$this->request->data['id'] =  $user_credits->id;
	    	}
	        $this->request->data['user_id'] = $user_id;
	        $this->request->data['creditvalue'] = $this->request->query['creditvalue'] + $creditvalue;
	        $cred = $this->Credits->patchEntity($cred,$this->request->data);

	        if($result = $this->Credits->save($cred)) {

	           
	            echo $result->creditvalue;
	        }else {

	            
	            echo "error";
	        }
	    }

	    $this->set(compact('data'));
	    $this->set('_serialize', 'data');
	}
}
?>