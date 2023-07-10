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
        $query = $this->db->get('PendingWallet');

        if($query->num_rows() > 0){
            return $query->result_array();
        }else{
            return array();
        }
    }

    public function updatePendingWalletStatus($idProfile, $status){
        $data = array(
            'status' => $status
        );
    
        $this->db->where('idProfile', $idProfile);
        $result = $this->db->update('PendingWallet', $data);
    
        if($result){
            return true;
        }else{
            return false;
        }
    }
    
    
}
