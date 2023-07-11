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
    
    public function getStatistiqueFemale()
    {
        $sql = "select count(sexe) as femme from userdata join profile on profile.idprofile=userdata.idprofile where sexe=0 and privilege=0";
        $query = $this->db->query($sql);
        $row = $query->row_array();
    
        if (!empty($row)) {
            return $row['femme'];
        } else {
            return 0;
        }
    }
    public function getStatistiqueMale()
    {
        $sql = "select count(sexe) as homme from userdata join profile on profile.idprofile=userdata.idprofile where sexe=1 and privilege=0";
        $query = $this->db->query($sql);
        $row = $query->row_array();
    
        if (!empty($row)) {
            return $row['homme'];
        } else {
            return 0;
        }
    }

    public function getUserDataByIdUserData($idUserData)
    {
        $query = $this->db->get_where('UserData', array('idUserData' => $idUserData));

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }

}
?>
