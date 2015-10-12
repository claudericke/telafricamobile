<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class DashboardsController extends AppController{

	public function index(){

		$this->viewBuilder()->layout('content');
    
    }

}

?>