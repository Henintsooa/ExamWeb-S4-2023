<?php
class Activite_Model extends CI_Model
{
    public function createActivite($nom, $idType, $apport, $frequence, $prix){
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
        $sql = "SELECT SUM(apport) AS poids FROM activite JOIN regime ON activite.idActivite = regime.idActivite WHERE idRegime = '$idRegime'";
        $query = $this->db->query($sql);
        $row = $query->row_array();
    
        if ($row) {
            return $row['poids'];
        } else {
            return 0;
        }
    }
}
?>
