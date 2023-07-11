<?php
class Activite_Model extends CI_Model {
    
    public function createActivite($nom, $idType, $apport, $frequence, $prix){
        if($frequence <= 0 || $prix < 0  ){ return false; }
        $data = array(
            'nom' => $nom,
            'idType' => $idType,
            'apport' => $apport,
            'frequence' => $frequence,
            'prix' => $prix
        );
    
        $result = $this->db->insert('Activite', $data);
    
        if($result){
            return true;
        }else{
            return false;
        }
    }
    
    public function getActivites(){
        $query = $this->db->get('Activite');
    
        if($query->num_rows() > 0){
            return $query->result_array();
        }else{
            return array();
        }
    }
    
    public function getPredictionPoids($idRegime)
    {
        $sql = "SELECT SUM(apport) AS poids FROM Activite JOIN Regime ON Activite.idActivite = Regime.idActivite WHERE idRegime = '$idRegime'";
        $query = $this->db->query($sql);
        $row = $query->row_array();
    
        if (!empty($row)) {
            return $row['poids'];
        } else {
            return 0;
        }
    }
}
?>
