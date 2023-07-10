<?php
class TypeActivite_Model extends CI_Model
{
    public function createTypeActivite($nom){
        $data = array(
            'nom' => $nom
        );
    
        $result = $this->db->insert('TypeActivite', $data);
    
        if($result){
            return true;
        }else{
            return false;
        }
    }
    
    public function getTypeActivites(){
        $query = $this->db->get('TypeActivite');
    
        if($query->num_rows() > 0){
            return $query->result_array();
        }else{
            return array();
        }
    }
}
?>
