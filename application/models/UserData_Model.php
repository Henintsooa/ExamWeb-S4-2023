<?php
class UserData_Model extends CI_Model
{
    public function createUserData($idProfile, $sexe, $taille, $poids, $dateCurrent){
        $data = array(
            'idProfile' => $idProfile,
            'sexe' => $sexe,
            'taille' => $taille,
            'poids' => $poids,
            'dateCurrent' => $dateCurrent
        );
    
        $result = $this->db->insert('UserData', $data);
    
        if($result){
            return true;
        }else{
            return false;
        }
    }
    public function getUserData($idProfile){
        $query = $this->db->get_where('UserData', array('idProfile' => $idProfile));
    
        if($query->num_rows() > 0){
            return $query->result_array();
        }else{
            return array();
        }
    }
    
}
?>
