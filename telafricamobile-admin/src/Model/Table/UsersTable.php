<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table{

	/**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config){
        $this->table('users');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
        $this->hasMany('Messages', [
            'foreignKey' => 'user_id'
        ]);
    }

	public function validationDefault(Validator $validator){
		
		return $validator
		->notEmpty('firstname', 'A first name is required')
		->notEmpty('lastname', 'A last name is required')
		->notEmpty('email', 'A email address is required')
		->add('email', 'valid', ['rule' => 'email'])
		->notEmpty('country', 'Please select your country')
		->notEmpty('password', 'A password is required')
		->notEmpty('password_confirm', 'Confirm password cannot be empty')
		->add('password_confirm', 'no-misspelling', [
        	'rule' => ['compareWith', 'password'],
        	'message' => 'Passwords are not equal',
    	]);
		
	}

}
?>
