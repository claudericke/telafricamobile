<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

use Cake\Network\Http\Client;
use Cake\Core\Configure;
use Cake\Mailer\Email;
use Cake\ORM\TableRegistry;

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
				return $this->redirect(['action' => 'beta']);
			}
			$this->Flash->error(__('Invalid username or password, please try again'));
		}
		$this->viewBuilder()->layout('login-registration');
	}

	public function index(){

		if($this->Auth->user('role') == 'admin' || $this->Auth->user('role') == 'sales'){
			$query = $this->Users->find('all')->contain(['Credits']);
			$this->set('users', $this->paginate($query));
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
			/**
			$http = new Client();
		
			$response = $http->post('https://www.google.com/recaptcha/api/siteverify', [
				'secret' => Configure::read('GoogleReCaptcha.Secretkey'),
				'response' => $this->request->data['g-recaptcha-response']
			]); // POST request
			**/
			$ch = curl_init();

			$data = array('secret' => Configure::read('GoogleReCaptcha.Secretkey'),'response' => $this->request->data['g-recaptcha-response']);

			// set URL and other appropriate options
			curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
			# Return response instead of printing.
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );
			$result = curl_exec($ch);
			
			// close cURL resource, and free up system resources
			curl_close($ch);

			$GoogleReCaptcha = json_decode($result);

			if ($GoogleReCaptcha->success == 'true'){
				
				/**$ch1 = curl_init();

				$data1 = array('action' => 'createuser', 
					'username' => Configure::read('OZEKI.User'), 
					'password' => Configure::read('OZEKI.Password'), 
					'type' => Configure::read('OZEKI.Type'), 
					'name' => trim($this->request->data['email'])
				);
				
				// set URL and other appropriate options
				curl_setopt($ch1, CURLOPT_URL, Configure::read('OZEKI.URL'));
				curl_setopt($ch1, CURLOPT_POST, true);
				curl_setopt($ch1, CURLOPT_POSTFIELDS, http_build_query($data1));
				# Return response instead of printing.
				curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true );			
				$resultaddUser = curl_exec($ch1);

				//echo "from service". $resultaddUser;

				
			   	$ch2 = curl_init();

				$data2 = array('action' => 'addcredits', 
					'username' => Configure::read('OZEKI.User'), 
					'password' => Configure::read('OZEKI.Password'), 
					'useraccount' => trim($this->request->data['email']),
					'add' => '5'
				);

				// set URL and other appropriate options
				curl_setopt($ch2, CURLOPT_URL, Configure::read('OZEKI.URL'));
				curl_setopt($ch2, CURLOPT_POST, true);
				curl_setopt($ch2, CURLOPT_POSTFIELDS, http_build_query($data2));
				# Return response instead of printing.
				curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true );
				// grab URL and pass it to the browser
				$result2 = curl_exec($ch2);
				
				//$xml = simplexml_load_string($result2);
				//$json = json_encode($xml);
				//addCredits = $xml->account->balance;

				// close cURL resource, and free up system resources
				curl_close($ch2);
				**/
				$user = $this->Users->patchEntity($user, $this->request->data);
				if ($result = $this->Users->save($user)) {					

					$creditsTable = TableRegistry::get('Credits');
					$credit= $creditsTable->newEntity();

					$credit->user_id = $result->id;
					$credit->creditvalue = '5';

					if ($creditsTable->save($credit)) {
					    
					    $this->Flash->success(__('The user has been saved.'));
						return $this->redirect(['action' => 'login']);
					}
					$this->Flash->error(__('Unable to add the user.'));
					//return $this->redirect(['action' => 'beta']);
				}
				$this->Flash->error(__('Unable to add the user.'));					
			
			//print_r($resultaddUser);
			// close cURL resource, and free up system resources
			//curl_close($ch1);
			
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
    public function delete($id = null){

        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function beta(){

		$this->viewBuilder()->layout('login-registration');
	}
}
?>
