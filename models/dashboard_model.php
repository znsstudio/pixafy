<?php

class Dashboard_Model extends Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function email(){

        $userid = Session::get('userid');

        $sth = $this->db->prepare("SELECT login FROM user WHERE userid=:userid");

        $sth->execute(array(
            ':userid' => $userid
        ));
        
        $data = $sth->fetch();

        return $data[login];

    }

    public function photo_list($user_id){

        $userid = Session::get('userid');

        $role = Session::get('role');

        if($role=="owner"){

            if($user_id>0){

                $sth = $this->db->prepare("SELECT user_id, id, photo_src, login FROM photos,user WHERE userid=user_id and user_id=:user_id");
               $sth->execute(array(
                ':user_id' => $user_id
            ));

            }
            else
            {    

                $sth = $this->db->prepare("SELECT user_id, id, photo_src, login FROM photos,user WHERE userid=user_id");
                $sth->execute();

            }

        }
        else
         {   

            $sth = $this->db->prepare("SELECT id, photo_src FROM photos WHERE user_id=:userid ORDER BY row_no asc");
            $sth->execute(array(
                ':userid' => $userid
            ));
        
        }

        $photoList = $sth->fetchAll();

        return $photoList;

    }

    public function upload(){

    $new_name= md5($_FILES['pic']['name']).".jpg";

    if($_FILES['pic']['name']!=''){
    
        move_uploaded_file($_FILES['pic']['tmp_name'], "/home/mvc/www/files/$new_name");

        $insert_array=array('user_id'=>Session::get('userid'),'photo_name'=>$_FILES['pic']['name'],'photo_src'=>$new_name);

        $this->db->insert('photos',$insert_array);

        return true;
    
    }
    else
    {
    
        return false;
    
    } 


    }

    public function update(){

       $this->db->update('user',array('login'=>$_POST['login'])," userid='".Session::get('userid')."'");

    }


     public function updateOrder(){

      foreach($_POST[photo] as $key=>$value){  

         $this->db->update('photos',array('row_no'=>$value)," id='".$key."'");

      }

    }   

     public function changeOwner(){

      foreach($_POST[photos] as $key=>$value){  

         $this->db->update('photos',array('user_id'=>$_POST['new_user_id'])," id='".$key."'");

      }

    } 


     public function deleteSelected(){

     $user_id =Session::get('userid');

     $role = Session::get('role');

      foreach($_POST[photos] as $key=>$value){  

        $sth = $this->db->prepare("SELECT photo_src FROM photos WHERE id=:delete_id");

        $sth->execute(array(
            ':delete_id' => $value
        ));
        
        $data = $sth->fetch();

         if($role=="onwer"){   

            $this->db->delete('photos'," id='".$value."'");

        }
        else
        {

             $this->db->delete('photos'," id='".$value."' and user_id='$user_id'");


        }    

        unlink("/home/mvc/www/files/$data[photo_src]");

      }

    }   


    public function delete($delete_id){

        $sth = $this->db->prepare("SELECT photo_src FROM photos WHERE id=:delete_id");

        $sth->execute(array(
            ':delete_id' => $delete_id
        ));
        
        $data = $sth->fetch();

        unlink("/home/mvc/www/files/$data[photo_src]");

        $this->db->delete("photos"," id='$delete_id' ");

    }

}