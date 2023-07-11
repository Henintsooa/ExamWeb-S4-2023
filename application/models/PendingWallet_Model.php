<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PendingWallet_model extends CI_Model {
    public function createPendingWallet($idProfile, $idCode, $status){
        $data = array(
            'idProfile' => $idProfile,
            'idCode' => $idCode,
            'status' => $status
        );

        $result = $this->db->insert('PendingWallet', $data);

        if($result){
            return true;
        }else{
            return false;
        }
    }

    public function getPendingWallets(){
        $query = $this->db->get_where('PendingWallet',array('status'=>0));

        if($query->num_rows() > 0){
            return $query->result_array();
        }else{
            return array();
        }
    }

    public function getPendingWalletDetails(){
        $this->load->model('Code_Model');
        $this->load->model('Profile_Model');
        $pendings = $this->getPendingWallets();
        $result = array();

        foreach($pendings as $pending ){
            
            $result[] = array(
                'Profile' => $this->Profile_Model->getProfileByID($pending['idProfile'] ),
                'Code' => $this->Code_Model->getCodesByID($pending['idCode'] ),
                "Status" => $pending['status'] 
            );

        }

        return $result;

    }

    public function updatePendingWalletStatus($idProfile, $idCode, $status){
        $data = array(
            'idProfile'=>$idProfile,
            'idCode'=>$idCode,
            'status' => $status
        );
    
        if(!($idProfile == '')){
            $this->db->where('idProfile', $idProfile);
        }
        $this->db->where('idCode', $idCode);
        $this->db->where('status', 0);

        $result = $this->db->update('PendingWallet', $data);
    
        if($result){
            return true;
        }else{
            return false;
        }
    }
    
    
}
