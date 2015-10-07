<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

use Cake\Network\Http\Client;
use Cake\Core\Configure;

class UsersController extends AppController{

	public function beforeFilter(Event $event){
		parent::beforeFilter($event);
		// Allow users to register and logout.
		// You should not add the "login" action to allow list. Doing so would
		// cause problems with normal functioning of AuthComponent.
		$this->Auth->allow(['register', 'login', 'logout']);
	}
	
	public function login(){
		if ($this->request->is('post')) {
			$user = $this->Auth->identify();
			if ($user) {
				$this->Auth->setUser($user);
				//return $this->redirect($this->Auth->redirectUrl());
				return $this->redirect(['controller' => 'dashboards', 'action' => 'index']);
			}
			$this->Flash->error(__('Invalid username or password, please try again'));
		}
	}

	public function index(){
        $this->set('users', $this->paginate($this->Users));
        $this->set('_serialize', ['users']);
    }

	public function view($id){

		$user = $this->Users->get($id);
		$this->set(compact('user'));
	}

	public function register(){ 

		$user = $this->Users->newEntity();
		if ($this->request->is('post')) {
			//echo "<pre>";print_r($this->request->data['g-recaptcha-response']);echo "</pre>";
			$http = new Client();
		
			$response = $http->post('https://www.google.com/recaptcha/api/siteverify', [
				'secret' => Configure::read('GoogleReCaptcha.Secretkey'),
				'response' => $this->request->data['g-recaptcha-response'],
				'remoteip' => $this->request->clientIp()
			]); // POST request
			
			if ($response->json['success'] == 'true'){
				$user = $this->Users->patchEntity($user, $this->request->data);
				if ($this->Users->save($user)) {
					$this->Flash->success(__('The user has been saved.'));
					return $this->redirect(['action' => 'login']);
				}
				$this->Flash->error(__('Unable to add the user.'));
			}else{
				$this->Flash->error(__('Please tick the captcha checkbox.'));
			}
		}
		$this->set('sitekey', Configure::read('GoogleReCaptcha.Sitekey'));
		$this->set('user', $user);
	}

	public function logout(){
		return $this->redirect($this->Auth->logout());
	}
}
?>
