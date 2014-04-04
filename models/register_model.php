<?php

class Register_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function finish_register()
    {
        $sth = $this->db->prepare("SELECT userid FROM user WHERE 
                login = :login AND password = :password");
        $sth->execute(array(
            ':login' => $_POST['login'],
            ':password' => md5($_POST['password'])
        ));
        
        $data = $sth->fetch();
        
        $count =  $sth->rowCount();

        if ($count == 0) {

            $insert_array=array('login'=>$_POST[login],'password'=>md5($_POST[password]));

            $this->db->insert('user',$insert_array);

            header('location: ../login');

        } else {
 
            header('location:../register/index/error');
 
        }
        
    }
    
}