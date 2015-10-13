<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

use Cake\Network\Http\Client;
use Cake\Core\Configure;
use Cake\Mailer\Email;

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
				return $this->redirect($this->Auth->redirectUrl());
				//return $this->redirect(['controller' => 'dashboards', 'action' => 'index']);
			}
			$this->Flash->error(__('Invalid username or password, please try again'));
		}
		$this->viewBuilder()->layout('login-registration');
	}

	public function index(){

		if($this->Auth->user('role') == 'admin' || $this->Auth->user('role') == 'sales'){
	        $this->set('users', $this->paginate($this->Users));
	        $this->set('_serialize', ['users']);
	       
    	}else{

    		$this->Flash->error(__('Sorry you do not have permission to view the user page!'));
    		return $this->redirect(['controller' => 'dashboards', 'action' => 'index']);
    	}

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
				'response' => $this->request->data['g-recaptcha-response']
			]); // POST request
			
			if ($response->json['success'] == 'true'){
				$user = $this->Users->patchEntity($user, $this->request->data);
				if ($this->Users->save($user)) {
					$email = new Email('gmail');
					$email->from(['tmalvern@gmail.com' => 'My Site'])
				    ->to('malvern@intarget.mobi')
				    ->subject('Registered on Telafrica sms gateway')
				    ->send('Welcome to Telafrica gateway');

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
		$this->viewBuilder()->layout('login-registration');
	}

	public function logout(){
		return $this->redirect($this->Auth->logout());
	}

	/**
     * Edit method
     *
     * @param string|null $id User id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null){
    	if($this->Auth->user('role') == 'admin' || $this->Auth->user('role') == 'sales'){
	        $user = $this->Users->get($id, [
	            'contain' => []
	        ]);
	        if ($this->request->is(['patch', 'post', 'put'])) {
	            $user = $this->Users->patchEntity($user, $this->request->data);
	            if ($this->Users->save($user)) {
	                $this->Flash->success(__('The user has been saved.'));
	                return $this->redirect(['action' => 'index']);
	            } else {
	                $this->Flash->error(__('The user could not be saved. Please, try again.'));
	            }
	        }
	        $this->set(compact('user'));
	        $this->set('_serialize', ['user']);
	    }else{

    		$this->Flash->error(__('Sorry you do not have permission to view the user page!'));
    		return $this->redirect(['controller' => 'dashboards', 'action' => 'index']);
    	}
    	$this->viewBuilder()->layout('login-registration');
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
?>
