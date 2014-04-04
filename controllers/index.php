<?php

class Index extends Controller {

    function __construct() {
        parent::__construct();
        Auth::handleLogin();
    }
    
    function index() {
        $this->view->title = 'Home';
        $this->view->render('index/index');
    }
    
}