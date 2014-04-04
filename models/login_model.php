<?php

class Login_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function run()
    {
        $sth = $this->db->prepare("SELECT userid,login,role FROM user WHERE 
                login = :login AND password = :password");
        $sth->execute(array(
            ':login' => $_POST['login'],
            ':password' => md5($_POST['password'])
        ));
        
        $data = $sth->fetch();
        
        $count =  $sth->rowCount();
        if ($count > 0) {
            // login
            Session::init();
            Session::set('loggedIn', true);
            Session::set('userid', $data['userid']);
            Session::set('login',$data['login']);
            Session::set('role',$data['role']);
            header('location: ../dashboard');
        } else {
            header('location: ../login');
        }
        
    }
    
}