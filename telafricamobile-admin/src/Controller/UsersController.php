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

class UsersController extends AppController{

	public function beforeFilter(Event $event){
		parent::beforeFilter($event);
		// Allow users to register and logout.
		// You should not add the "login" action to allow list. Doing so would
		// cause problems with normal functioning of AuthComponent.
		$this->Auth->allow(['register', 'login', 'logout', 'activate', 'forgotpassword', 'reset']);
	}
	
	public function login(){

		if ($this->request->is('post')) {
			$user = $this->Auth->identify();
			
			if ($user) {
				if($user['activate'] == 1){
					$this->Auth->setUser($user);
					return $this->redirect($this->Auth->redirectUrl());
					//return $this->redirect(['action' => 'beta']);
				}else{
					$this->Flash->error(__('Please verify your account by clicking on the link that was sent to your email.'));
				}
			}else{
				$this->Flash->error(__('Invalid username or password, please try again'));
			}
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
				
				//Create Token using form data and random number to ensure its unique and cannot be replicated
				
				$key = Security::hash(Text::uuid(),'sha512',true);
                $hash = sha1($this->request->data['email'].rand(0,100));
                $url = Router::url(['controller' => 'users', 'action'=>'activate'], true ).'/'.$key.'#'.$hash;
                $ms = $url;
                $ms = wordwrap($ms,1000);

				$this->request->data['tokenhash'] = $key;
				$user = $this->Users->patchEntity($user, $this->request->data);
				if ($result = $this->Users->save($user)) {					

					$creditsTable = TableRegistry::get('Credits');
					$credit= $creditsTable->newEntity();

					$credit->user_id = $result->id;
					$credit->creditvalue = '5';

					if ($creditsTable->save($credit)) {

						$Message1 = "<p>Hi ".$this->request->data['firstname']. " ".$this->request->data['lastname']."</p>";
	                    $Message2 = "<p>Thank you for registering on the telafrica SMS gateway portal.<br>To activate your account, please click below</p>";
	                   

	                    $Message3 = '<span style="color: #ffffff; font-weight: 300;">
                                  <a style="color: #ffffff; text-align:center;text-decoration: none;" href="'.$url.'">Activate Account</a>
                               </span>';
                    	$Message4 = "<p>Regards<br> <br>Telafrica Mobile Team.</p>";

	                    $Email = new Email('default');
	                    $Email->from(['telafrica360@gmail.com' => 'TelAfrica Moblie Registration'])
	                    	->emailFormat('html')
                    		->template('emailtemplate')
	                    	->to($this->request->data['email'])
	                    	->subject('Activate Your telafrica Account')
	                    	->viewVars(['value' => $Message1, 'value2' => $Message2, 'value3' => $Message3, 'value4' => $Message4])
	                    	->send();
					    	
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

	public function activate($token=null){
      //$this->viewBuilder()->layout('login-registration');
		$this->autoRender = false;
        if(!empty($token)){
            $user = $this->Users->findByTokenhash($token)->first();
           
            if($user){
                $this->Users->id = $user->id;
                if(!empty($this->Users->id)){
                    $this->Users->data = $this->data;

                    $this->Users->data['email'] = $user->email;
                    $new_hash = sha1($this->Users->data['email'].rand(0,100));//created new token
                    $this->Users->data['tokenhash'] = $new_hash;
                    $this->Users->data['activate'] = 1;
                    $this->Users->data['id'] = $user->id;
                    
                   	//var_dump($this->Users->data);die;
                   	$user = $this->Users->patchEntity($user, $this->Users->data);
                    if($this->Users->save($user)){
                        $this->Flash->success(__('Your account has been activated'));
                        $this->redirect(['controller'=>'users','action'=>'login']);
                    }else{

                        $this->Flash->error(__('Sorry we could not activte your account'));
                        $this->redirect(['controller'=>'users','action'=>'login']);
                    }

                }
            }else{
                $this->Flash->error(__('Token Corrupted, your activation link only works once.'));
                $this->redirect(['controller'=>'users','action'=>'login']);
            }
        }else{
            $this->redirect('/');
        }
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

	public function forgotpassword() {
         $this->viewBuilder()->layout('login-registration');
        //if already logged-in, redirect
        if($this->Auth->user('id')){
            $this->redirect(['action' => 'index']);      
        }
         
        // if we get the post information, try to authenticate
        if ($this->request->is('post')) {

            $specificallyThisUser = $this->Users->findByEmail($this->request->data['email'])->first();
            //debug($specificallyThisUser);die;
            if(!empty($specificallyThisUser)){
            	$this->Users->data = $this->data;
                $key = Security::hash(Text::uuid(),'sha512',true);
                $hash = sha1($specificallyThisUser->email.$specificallyThisUser->id.rand(0,100));
                $url = Router::url( ['controller'=>'users','action'=>'reset'], true ).'/'.$key.'#'.$hash;
                $ms = $url;
                $ms = wordwrap($ms,1000);
                //var_dump($url);
                $this->Users->data['tokenhash'] = $key;
                $this->Users->data['id'] = $specificallyThisUser->id;

                $specificallyThisUser = $this->Users->patchEntity($specificallyThisUser, $this->Users->data);
                if($this->Users->save($specificallyThisUser)){
                //if($this->Users->saveField('tokenhash',$specificallyThisUser->tokenhash)){

                    $Message1 = "<p>Hi ".$specificallyThisUser->firstname. " ".$specificallyThisUser->lastname."</p>";
                    $Message2 = "<p>You have requested to reset your password.<br>Please click below to reset your password.</p>";
                    $Message3 = '<span style="color: #ffffff; font-weight: 300;">
                                  <a style="color: #ffffff; text-align:center;text-decoration: none;" href="'.$url.'">Reset Password</a>
                               </span>';
                    $Message4 = "<p>Regards<br> <br>Telafrica Mobile Team.</p>";

                    $Email = new Email('default');
                    $Email->from(['telafrica360@gmail.com' => 'TelAfrica Moblie'])
                    	->emailFormat('html')
                    	->template('emailtemplate')
                    	->to($specificallyThisUser->email)
                    	->subject('Password Reset')
                    	->viewVars(['value' => $Message1, 'value2' => $Message2, 'value3' => $Message3, 'value4' => $Message4])
                    	->send();
                    $this->Flash->success(__(' Details have been emailed to this email address '.$specificallyThisUser->email));
                }else{

                    $this->Flash->error(__('Error Generating Reset link'));
                }
            }else{

                 $this->Flash->error(__(' Sorry we could not find the user name you entered'));
            }
        } 
    }

    public function reset($token=null){
        $this->viewBuilder()->layout('login-registration');
		//debug($this->request->data);die;
        if(!empty($token)){
            $user = $this->Users->findByTokenhash($token)->first();
           
            if($user){
                $this->Users->id = $user->id;
                //if(!empty($this->Users->id)){
                if ($this->request->is('post')) {
                	
                    $this->Users->data = $this->data;

                    //$this->Users->data['email'] = $user['email'];
                    $new_hash = sha1($user->email.$user->country.rand(0,100));//created token
                    $this->Users->data['tokenhash'] = $new_hash;
                    $this->Users->data['id'] = $user->id;
                    $this->Users->data['password'] = $this->request->data['password'];
                    //debug($this->Users->data);die;
                   	$user = $this->Users->patchEntity($user, $this->Users->data);
                    if($this->Users->save($user)){
                        $this->Flash->success(__('Password Has been Updated'));
                        $this->redirect(['action'=>'login']);
                    }else{

                       $this->Flash->error(_('Something went wrong :( :('));
                    }                    
               }
            }else{
                $this->Flash->error(_('Token Corrupted, the reset link only works once.'));
            }
        }else{
            $this->redirect('/');
        }
    }

    public function add(){
		$user = $this->Users->newEntity();
		if($this->request->is('ajax')) {
            $this->autoRender = false;
            $this->request->query['activate'] = 1;
			$user = $this->Users->patchEntity($user, $this->request->query);
			if ($result = $this->Users->save($user)) {

				$creditsTable = TableRegistry::get('Credits');
				$credit= $creditsTable->newEntity();

				$credit->user_id = $result->id;
				$credit->creditvalue = '0';

				if ($creditsTable->save($credit)) {
					echo 'The user has been saved.';
				}else{
					echo 'error';
				}
			}
		}
		$this->set('user', $user);
	}	
}
?>
