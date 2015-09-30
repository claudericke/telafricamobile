<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table{

	public function validationDefault(Validator $validator){
		
		return $validator
		->notEmpty('firstname', 'A first name is required')
		->notEmpty('lastname', 'A last name is required')
		->notEmpty('email', 'A email address is required')
		->notEmpty('mobilenumber', 'Mobile number is required')
		->notEmpty('country', 'Please type your country')
		->notEmpty('password', 'A password is required');
		
	}
}
?>
