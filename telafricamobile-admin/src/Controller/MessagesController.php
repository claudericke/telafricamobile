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
use Cake\Datasource\ConnectionManager;

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
	    //$this->set('_serialize', ['sentMessages']);

	    //$subscriber_listsTable = TableRegistry::get('subscriber_lists');
	    $conn = ConnectionManager::get('default');

	    $query = "SELECT subscriber_lists.id, subscriber_lists.listname, subscriber_lists.listdescription, count(subscriber_lists_subscribers.msisdn) AS totalSubscibers
		FROM subscriber_lists subscriber_lists
		LEFT JOIN subscriber_lists_subscribers
		ON
		subscriber_lists.id = subscriber_lists_subscribers.subscriber_lists_id
		WHERE subscriber_lists.user_id = ".$this->Auth->user('id')."
		GROUP BY subscriber_lists.id
		ORDER By subscriber_lists.listname";
			   
		$list = $conn->execute($query)->fetchAll('assoc');
		//$rows = $conn->fetchAll('assoc');
	   	//echo $query;die;
		$this->set('messageLists', $list);

		$messageTemplatesTable = TableRegistry::get('message_templates');

		$query = $messageTemplatesTable->find('all', [
		    'conditions' => ['message_templates.user_id =' => $this->Auth->user('id')],
		    'order' => ['message_templates.id' => 'ASC']
		]);

		$messageTemplates = $query->toArray();
		$this->set('messageTemplates', $messageTemplates);

	    $this->set('_serialize', ['sentMessages','messageLists', 'messageTemplates']);

	              
    }

    private function remove_prefix($text, $prefix) {
    
	    return preg_replace('/^' . preg_quote($prefix, '/') . '/', '', $text);
	}

    public function sendSMS(){

    	if($this->request->is('post')){
	    	$this->autoRender = false;

	    	$creditsTable = TableRegistry::get('Credits');
			$credits = $creditsTable->find()
	    		->select(['id','creditValue'])
			 	->where(['Credits.user_id =' => $this->Auth->user('id')])
			 	->first();

	    	$SMSTable = TableRegistry::get('sms');		

	    	$countryPrefixTable = TableRegistry::get('countries');	
	    	$countryPrefix = $countryPrefixTable->find()
	    		->select(['countryphonecode'])
			 	->where(['countries.countrycode =' => $this->Auth->user('countrycode')])
			 	->first();

	    	//debug($countryPrefix->countryphonecode); 
	    	//die;
	    	$now = date('Y-m-d H:i:s');
	    	$csvNUmbers = array();
	    	$queuedSMS = 0;

	    	//echo "<pre>";print_r($_FILES); echo "</pre>";
		   	if($_FILES["uploadBtn1"]["name"]) {
				$filename = $_FILES["uploadBtn1"]["name"];
				$source = $_FILES["uploadBtn1"]["tmp_name"];
				$type = $_FILES["uploadBtn1"]["type"];
				
				$name = explode(".", $filename);
				$accepted_types = array('application/zip', 'application/x-zip-compressed', 'multipart/x-zip', 'application/x-compressed');
				
				$continue = strtolower($name[1]) == 'zip' ? true : false;
				if(!in_array($type, $accepted_types)) {
					
					$message['error'] = true;
					$message['message'] = "The file you are trying to upload is not a .zip file. Please try again.";
					
					return;
				}

				$target_path = Configure::read('UPLOADFOLDER').$filename; 
				if(move_uploaded_file($source, $target_path)) {
					$zip = new \ZipArchive();
					$x = $zip->open($target_path);
					if ($x === true) {

						for( $i = 0; $i < $zip->numFiles; $i++){ 
		    				
							/**
							 * Here we get the name of the Extracted file
							 * 
							 */ 
							$stat = $zip->statIndex( $i );
	    					$ExtractedFile = basename($stat['name']);
						
						}
						$zip->extractTo(Configure::read('UPLOADFOLDER')); 
						$zip->close();
				
						unlink($target_path);
					}
					

	       			$processfile = fopen(Configure::read('UPLOADFOLDER').$ExtractedFile, 'r');
					while (($line = fgetcsv($processfile)) !== FALSE) {
						if (is_numeric($line[0])){
							$csvNUmbers [] = $line[0];
						}
					}

					if(count($csvNUmbers) <= $credits->creditValue){

						foreach ($csvNUmbers as $msisdn) {	

							if($msisdn[0] == '0'){

								$msisdn = $countryPrefix->countryphonecode.$this->remove_prefix($msisdn, $msisdn[0]);

							}						

							$SMS = $SMSTable->newEntity();				
					    	$SMS->user_id = $this->Auth->user('id');
					    	$SMS->campaign_id = 0;
					    	$SMS->content = $this->request->data['message'];
					    	$SMS->msisdn = $msisdn;
					    	$SMS->datetosend = $now;
					    	$SMS->status = 'Q';
					    	$SMS->retries = 0;		    	

					        if(!$result = $SMSTable->save($SMS)){
					           
					       		$message['error'] = true;
					       		$message['message'] = "";
				       		}else{
				       			$queuedSMS++;
				       		}
				       	
		       			}

		       			if($queuedSMS > 0){
					    	$credit= $creditsTable->newEntity();

							$credit->id = $credits->id;
							$credit->creditvalue = ($credits->creditValue - $queuedSMS);
			    			$creditsTable->save($credit);
			    			$message['error'] = false;
					       	$message['message'] = ($credits->creditValue - $queuedSMS);
			    		}

		       		}else{

		       			$message['error'] = true;
		    			$message['message'] = "Sorry you do not have enough credits to send the SMSs. Your current credit balance is ".$credits->creditValue;
		       		}
					fclose($processfile);
					unlink(Configure::read('UPLOADFOLDER').$ExtractedFile);

		       		
 
					//echo "Extracted File ".$ExtractedFile;
				} else {

					
	       			$message['error'] = true;
	    			$message['message'] = "There was a problem with the upload. Please try again.";
					
				}
				//echo $message;
			}elseif($this->request->data['sendTo']){
				
				$numbers = explode(',', $this->request->data['sendTo']);
				
				if(count($numbers) <= $credits->creditValue){		
					
					foreach ($numbers as $MSISDN) {

						if($MSISDN[0] == '0'){

							$MSISDN = $countryPrefix->countryphonecode.$this->remove_prefix($MSISDN, $MSISDN[0]);

						}
						
						$SMS = $SMSTable->newEntity();				
				    	$SMS->user_id = $this->Auth->user('id');
				    	$SMS->campaign_id = 0;
				    	$SMS->content = $this->request->data['message'];
				    	$SMS->msisdn = $MSISDN;
				    	$SMS->datetosend = $now;
				    	$SMS->status = 'Q';
				    	$SMS->retries = 0;		    	

				        if(!$result = $SMSTable->save($SMS)){
				           
				       		echo 'error';
			       		}else{

			       			$queuedSMS++;
			       		}

			       		if($queuedSMS > 0){
					    	$credit= $creditsTable->newEntity();

							$credit->id = $credits->id;
							$credit->creditvalue = ($credits->creditValue - $queuedSMS);
			    			$creditsTable->save($credit);
			    			$message['error'] = false;
					       	$message['message'] = ($credits->creditValue - $queuedSMS);
			    		}
				    }
				}else{
					$message['error'] = true;
		    		$message['message'] = "Sorry you do not have enough credits to send the SMSs. Your current credit balance is ".$credits->creditValue;

				}
			}	    	
	    }

	    echo json_encode($message);
    }

    public function createSubscriberList(){

	    if($this->request->is('post')){

	    	$this->autoRender = false;


	    	$subscriber_listsTable = TableRegistry::get('subscriber_lists');
			$subscriber_lists_subscribersTable = TableRegistry::get('subscriber_lists_subscribers');
		   	//$data = $this->request->data;

		   	//echo "<pre>";print_r($_FILES); echo "</pre>";
		   	if($_FILES["uploadBtn"]["name"]) {
				$filename = $_FILES["uploadBtn"]["name"];
				$source = $_FILES["uploadBtn"]["tmp_name"];
				$type = $_FILES["uploadBtn"]["type"];
				
				$name = explode(".", $filename);
				$accepted_types = array('application/zip', 'application/x-zip-compressed', 'multipart/x-zip', 'application/x-compressed');
				
				/**foreach($accepted_types as $mime_type) {
					if($mime_type == $type) {
						$okay = true;
						break;
					} 
				}**/
				
				$continue = strtolower($name[1]) == 'zip' ? true : false;
				if(!in_array($type, $accepted_types)) {
					$message = "The file you are trying to upload is not a .zip file. Please try again.";

					echo "error";
					return;
				}

				$target_path = Configure::read('UPLOADFOLDER').$filename; 
				if(move_uploaded_file($source, $target_path)) {
					$zip = new \ZipArchive();
					$x = $zip->open($target_path);
					if ($x === true) {

						for( $i = 0; $i < $zip->numFiles; $i++){ 
		    				
							/**
							 * Here we get the name of the Extracted file
							 * 
							 */ 
							$stat = $zip->statIndex( $i );
	    					$ExtractedFile = basename($stat['name']);
						
						}
						$zip->extractTo(Configure::read('UPLOADFOLDER')); 
						$zip->close();
				
						unlink($target_path);
					}
					$message = "Your .zip file was uploaded and unpacked.";

					$subscriber_lists = $subscriber_listsTable->newEntity();
					$subscriber_lists->user_id = $this->Auth->user('id');
					$subscriber_lists->listname = $this->request->data['listname'];
					$subscriber_lists->listdescription = $this->request->data['listdesciption'];

					if(!$result = $subscriber_listsTable->save($subscriber_lists)){
		           
			       		echo 'error';

		       		}else{

		       			$processfile = fopen(Configure::read('UPLOADFOLDER').$ExtractedFile, 'r');
						while (($line = fgetcsv($processfile)) !== FALSE) {
							if (is_numeric($line[0])){

								$subscriber_lists_subscribers = $subscriber_lists_subscribersTable->newEntity();
			       				$subscriber_lists_subscribers->subscriber_lists_id = $result->id;
			       				$subscriber_lists_subscribers->msisdn = $line[0];

			       				if(!$results = $subscriber_lists_subscribersTable->save($subscriber_lists_subscribers)){
			           
						       		echo 'error';

					       		}
					       	}
		       			}
						fclose($processfile);
						unlink(Configure::read('UPLOADFOLDER').$ExtractedFile);

		       		}
 
					//echo "Extracted File ".$ExtractedFile;
				} else {	
					$message = "There was a problem with the upload. Please try again.";
					echo "error";
				}
				//echo $message;
			}
		   	
		}
    }

    public function addSubsciber (){

    	if($this->request->is('ajax')) {
    		
	    	$this->autoRender = false;
	    	$subscriber_lists_subscribersTable = TableRegistry::get('subscriber_lists_subscribers');
	    	$query = $subscriber_lists_subscribersTable->find('all', [
			    'conditions' => ['subscriber_lists_subscribers.msisdn =' => $this->request->query['subscriberNumber'], 'subscriber_lists_subscribers.subscriber_lists_id =' => $this->request->query['listid']] 
			]);
			
	    	$existingNumber = $query->count();
	    	//debug($existingNumber);die;
	    	if($existingNumber == 0){
		    	$subscriber = $subscriber_lists_subscribersTable->newEntity();

		    	$subscriber->msisdn = $this->request->query['subscriberNumber'];
		    	$subscriber->subscriber_lists_id = $this->request->query['listid'];

		    	if ($subscriber_lists_subscribersTable->save($subscriber)) {

		    		$query = $subscriber_lists_subscribersTable->find('all', [
					    'conditions' => ['subscriber_lists_subscribers.subscriber_lists_id =' => $this->request->query['listid']] 
					]);
			
	    			$existingNumber = $query->count();
					$message['error'] = false;
					$message['message'] = $existingNumber;
				}else{
					$message['error'] = true;
					$message['message'] = "Something went wrong. Please try again!";
				}
			}else{

				$message['error'] = true;
				$message['message'] = "This number ".$this->request->query['subscriberNumber']." is already part of this subscriber list";
			}

			echo json_encode($message);
	    }
    }

    public function deleteList(){


    	if($this->request->is('ajax')) {
    		
	    	$this->autoRender = false;

	    	$subscriber_listsTable = TableRegistry::get('subscriber_lists');
			$subscriber_lists_subscribersTable = TableRegistry::get('subscriber_lists_subscribers');

			$subscriber_listsTable->deleteAll(['id' => $this->request->query['listid']]);
			$subscriber_lists_subscribersTable->deleteAll(['subscriber_lists_id' => $this->request->query['listid']]);

			$message['error'] = false;
			$message['message'] = "The list has been deleted";

			echo json_encode($message);
	    }


    }

    public function sendMessageToList(){

     	if($this->request->is('ajax')) {
    		
	    	$this->autoRender = false;

	    	$creditsTable = TableRegistry::get('Credits');
			$credits = $creditsTable->find()
	    		->select(['id','creditValue'])
			 	->where(['Credits.user_id =' => $this->Auth->user('id')])
			 	->first();
			
	    	$SMSTable = TableRegistry::get('sms');
	    	$subscriber_lists_subscribersTable = TableRegistry::get('subscriber_lists_subscribers');	

	    	$subscriber_lists = $subscriber_lists_subscribersTable->find()
	    		->select(['msisdn'])
			 	->where(['subscriber_lists_subscribers.subscriber_lists_id =' => $this->request->query['listid']]);	
			$subscriber_lists_count = $subscriber_lists->count();

			//debug($subscriber_lists_count);die;
			if($subscriber_lists_count <= $credits->creditValue){

				$now = date('Y-m-d H:i:s');
				$queuedSMS = 0;
				foreach ($subscriber_lists as $subscriber) {

					$SMS = $SMSTable->newEntity();				
			    	$SMS->user_id = $this->Auth->user('id');
			    	$SMS->campaign_id = 0;
			    	$SMS->content = $this->request->query['message'];
			    	$SMS->msisdn = $subscriber->msisdn;
			    	$SMS->datetosend = $now;
			    	$SMS->status = 'Q';
			    	$SMS->retries = 0;		    	

			        if(!$result = $SMSTable->save($SMS)){
			           
			       		$message['error'] = true;
			       		$message['message'] = "There was and error. Please try again!";
		       		}else{
		       			$queuedSMS++;
		       			
		       		}
			    }

			    if($queuedSMS > 0){
			    	$credit= $creditsTable->newEntity();

					$credit->id = $credits->id;
					$credit->creditvalue = ($credits->creditValue - $queuedSMS);
	    			$creditsTable->save($credit);
	    			$message['error'] = false;
			       	$message['message'] = ($credits->creditValue - $queuedSMS);
	    		}
			}else{

				$message['error'] = true;
			    $message['message'] = "Sorry you do not have enough credits to send the SMSs. Your current credit balance is ".$credits->creditValue;
			}

		   	echo json_encode($message);   	

	    }

     }

    public function createMessageTemplate(){
    	if($this->request->is('ajax')) {
    		
	    	$this->autoRender = false;

	    	$messageTemplatesTable = TableRegistry::get('message_templates');
	    	$messageTemplates = $messageTemplatesTable->newEntity();


	    	$messageTemplates->templateContent = $this->request->query['message'];
	    	$messageTemplates->user_id = $this->Auth->user('id');

	    	if($messageTemplatesTable->save($messageTemplates)){

	    		$message['error'] = false;
	    		$message['message'] = "";
	    	}else{

	    		$message['error'] = true;
	    		$message['message'] = "There was an error. Please try again.";
	    	}

	    	echo json_encode($message);

    	}
    }

    public function deleteMessageTemplate(){

    	if($this->request->is('ajax')) {
    		
	    	$this->autoRender = false;

	    	$messageTemplatesTable = TableRegistry::get('message_templates');
	    	if($messageTemplatesTable->deleteAll(['id' => $this->request->query['template_id']])){

	    		$message['error'] = false;
	    		$message['message'] = "";
	    	}else{

	    		$message['error'] = true;
	    		$message['message'] = "There was an error. Please try again.";
	    	}
	    	echo json_encode($message);
	    }  	

    }

}