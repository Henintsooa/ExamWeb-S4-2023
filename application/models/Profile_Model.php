<?php
class Profile_Model extends CI_Model
{
    public function checkLogin($username, $password) {

        $query = $this->db->get_where('Profile',array('username'=>$username, 'passw'=>$password));

        if($query->num_rows() === 1 ){
            return true;
        }else{
            return false;
        }
    }
    
    public function createUser($username, $password){
        if( $username != "" && $password != "" ){

            $query = $this->db->get_where('Profile',array('username'=>$username));
            if($query->num_rows() === 1){
                return false;
            }

            $data = array(
                'username' => $username,
                'passw' => $password,
                'privilege' => 0 
            );

            $result = $this->db->insert( 'Profile' , $data );

            if($result){
                return true;
            }else{
                return false;
            }
        }

        return false;
        
    }

    public function getUserData($username){
        $query = $this->db->get_where('Profile',array('username'=>$username));

        if($query->num_rows() === 1){
            return $query->result_array();
        }else{
            return array();
        }
    }
}
?>
