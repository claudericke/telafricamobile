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
				foreach($accepted_types as $mime_type) {
					if($mime_type == $type) {
						$okay = true;
						break;
					} 
				}
				
				$continue = strtolower($name[1]) == 'zip' ? true : false;
				if(!$continue) {
					$message = "The file you are trying to upload is not a .zip file. Please try again.";
					echo "error";
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
			}
		   	
		}
    }


}