<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

use Cake\Network\Http\Client;
use Cake\Core\Configure;
use Cake\Mailer\Email;
use Cake\ORM\TableRegistry;
use Cake\Utility\Security;
use Cake\Utility\Text;
use Cake\Routing\Router;

class MessagesController extends AppController{

	public function beforeFilter(Event $event){
		parent::beforeFilter($event);
		// Allow users to register and logout.
		// You should not add the "login" action to allow list. Doing so would
		// cause problems with normal functioning of AuthComponent.
		//$this->Auth->allow();
	}

	public function index(){
		
		$SMSTable = TableRegistry::get('sms');
		$query = $SMSTable->find('all', [
		    'conditions' => ['sms.user_id =' => $this->Auth->user('id')],
		    'order' => ['sms.datetosend' => 'DESC']
		]);
		$this->set('sentMessages', $this->paginate($query));
	    $this->set('_serialize', ['sentMessages']);
	              
    }

    public function sendSMS(){

    	if($this->request->is('ajax')) {
	    	$this->autoRender = false;
	    	$SMSTable = TableRegistry::get('sms');
			

			$numbers = explode(',', $this->request->query['sendTo']);
			
			$now = date('Y-m-d H:i:s');
			foreach ($numbers as $MSISDN) {

				$SMS = $SMSTable->newEntity();				
		    	$SMS->user_id = $this->Auth->user('id');
		    	$SMS->campaign_id = 0;
		    	$SMS->content = $this->request->query['message'];
		    	$SMS->msisdn = $MSISDN;
		    	$SMS->datetosend = $now;
		    	$SMS->status = 'Q';
		    	$SMS->retries = 0;		    	

		        if(!$result = $SMSTable->save($SMS)){
		           
		       		echo 'error';
	       		}
		    }	    	
	    }
    }

    public function createSubscriberList(){

    	/**if($this->request->is('ajax')) {
	    	$this->autoRender = false;
	    	$subscriber_listsTable = TableRegistry::get('subscriber_lists');
			$subscriber_lists_subscribersTable = TableRegistry::get('subscriber_lists_subscribers');

			
	    }**/

	    if($this->request->is('post')){
	    	$this->autoRender = false;
		   	$data = $this->request->data;
		   	echo "<pre>";print_r($data); echo "</pre>";
		   //You should be able to see file data in this array
		}
    }


}