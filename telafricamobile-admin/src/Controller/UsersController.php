<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class UsersController extends AppController{

	public function beforeFilter(Event $event){
		parent::beforeFilter($event);
		// Allow users to register and logout.
		// You should not add the "login" action to allow list. Doing so would
		// cause problems with normal functioning of AuthComponent.
		$this->Auth->allow(['register', 'login']);
	}
	
	public function login(){
		if ($this->request->is('post')) {
			$user = $this->Auth->identify();
			if ($user) {
				$this->Auth->setUser($user);
				return $this->redirect($this->Auth->redirectUrl());
			}
			$this->Flash->error(__('Invalid username or password, try again'));
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
			//echo "<pre>";print_r($this->request->data);echo "</pre>";
			$user = $this->Users->patchEntity($user, $this->request->data);
			if ($this->Users->save($user)) {
				$this->Flash->success(__('The user has been saved.'));
				return $this->redirect(['action' => 'register']);
			}
			$this->Flash->error(__('Unable to add the user.'));
		}
		$this->set('user', $user);
	}

	public function logout(){
		return $this->redirect($this->Auth->logout());
	}
}
?>
