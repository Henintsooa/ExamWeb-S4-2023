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
    public function checkCode($code, $idProfile){
        $sql = "SELECT code, isUsed, montant FROM code WHERE code = '$code'";
        $query = $this->db->query($sql);
        $result = $query->row();
    
        if($result && $result->isUsed == 0){
            $montant = $result->montant;
            $this->ajoutsolde($montant,$idProfile);
        }else{
            return "Ce code est invalide";
        }
    }
    

    public function ajoutSolde($somme,$idProfile)
    {
        $sql = "SELECT (montant+$somme) as solde FROM wallet where idProfile=$idProfile";
        $this->db->query($sql);
    }

    public function getCodeValid()
    {
        $sql= "select * from code where isUsed = 0";
        $query = $this->db->query($sql);
        $result = array();

        foreach($query->result_array() as $row)
        {
            $result[]=$row;
        }
        return $result;
    }
}
?>
