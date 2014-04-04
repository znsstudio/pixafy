<?php

class Register extends Controller {

    function __construct() {
        parent::__construct();    
    }
    
    function index($error="") 
    {    
        $this->view->title = 'Register';

        if(!empty($error)){ $this->view->error = 'email is already registered';  }
        
        $this->view->render('header');
        $this->view->render('register/index');
        $this->view->render('footer');
    }
    
    function finish_register()
    {
       
         $this->model->finish_register();

    }
    

}