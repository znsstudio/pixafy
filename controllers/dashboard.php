<?php

class Dashboard extends Controller {

    function __construct() {
        parent::__construct();
        Auth::handleLogin();
        $this->view->js = array('dashboard/js/default.js');
    }
    
    function index($sitution="",$user_id="") 
    {    
        $this->view->title = 'Dashboard';
    
        $this->view->photoList = $this->model->photo_list($user_id);
    
        $this->view->email = $this->model->email();

        $this->view->render('header');
        $this->view->render('dashboard/index');
        $this->view->render('footer');
    }
    
    public function upload(){

        if($this->model->upload()){

            header("location:/dashboard/index/successfull");

        }
        else
         {

            header("location:/dashboard/index/error");

         }   

    }

    public function update(){

         $this->model->update();

        header("location:/dashboard/");

    }

    public function delete($delete_id){

        $this->model->delete($delete_id);

    }

    public function updateOrder(){

        $this->model->updateOrder();

    }

    public function deleteSelected(){

        $this->model->deleteSelected();

        header("location:/dashboard/");

    }

    function logout()
    {
        Session::destroy();
        header('location: ' . URL .  'login');
        exit;
    }
    

}