<?php
class Code_Model extends CI_Model
{
    public function createCode($montant, $isUsed, $code)
    {
        if (strlen($code) < 5) {
            return false;
        }
    
        $data = array(
            'montant' => $montant,
            'isUsed' => $isUsed,
            'code' => $code
        );
    
        $result = $this->db->insert('Code', $data);
    
        if ($result) {
            return true;
        } else {
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

    public function getCodesByID($id){
        $query = $this->db->get_where('Code',array('idCode'=> $id));
    
        if($query->num_rows() === 1){
            return $query->result_array()[0];
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

    public function getCodeValid($idProfile)
    {
        $sql= "select * from code where isUsed = 0 AND idCode NOT IN (SELECT idCode FROM PENDINGWALLET WHERE idProfile=".$idProfile." and status=0 )";
        $query = $this->db->query($sql);
        $result = $query->result_array();

        if(empty($result)){
            return array();
        }

        return $result;
    }

}
?>
