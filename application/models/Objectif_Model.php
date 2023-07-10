<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Objectif_model extends CI_Model {
    public function createObjectif($idRegime, $poids, $montant, $repetition){
        $data = array(
            'idRegime' => $idRegime,
            'poids' => $poids,
            'montant' => $montant,
            'repetition' => $repetition
        );

        $result = $this->db->insert('Objectif', $data);

        if($result){
            return true;
        }else{
            return false;
        }
    }

    public function getObjectifs(){
        $query = $this->db->get('Objectif');

        if($query->num_rows() > 0){
            return $query->result_array();
        }else{
            return array();
        }
    }


}
