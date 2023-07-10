<?php
class Code_Model extends CI_Model
{
    public function createCode($montant, $isUsed, $code){
        $data = array(
            'montant' => $montant,
            'isUsed' => $isUsed,
            'code' => $code
        );
    
        $result = $this->db->insert('Code', $data);
    
        if($result){
            return true;
        }else{
            return false;
        }
    }
    
    public function getCodes(){
        $query = $this->db->get('Code');
    
        if($query->num_rows() > 0){
            return $query->result_array();
        }else{
            return array();
        }
    }  
    
}
?>
