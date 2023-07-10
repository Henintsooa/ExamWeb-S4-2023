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
    
    public function createProfile($username, $password){
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

    public function getProfileData($username){
        $query = $this->db->get_where('Profile',array('username'=>$username));

        if($query->num_rows() === 1){
            return $query->result_array();
        }else{
            return array();
        }
    }

    public function updateNomProfile($idProfile, $username){
        $data = array(
            'username' => $username
        );
    
        $this->db->where('idProfile', $idProfile);
        $result = $this->db->update('Profile', $data);
        if($result){
            return true;
        }else{
            return false;
        }
    }
    public function updatePassWProfile($idProfile, $passw){
        $data = array(
            'passw' => $passw
        );
    
        $this->db->where('idProfile', $idProfile);
        $result = $this->db->update('passw', $data);
        if($result){
            return true;
        }else{
            return false;
        }
    }
}
?>
