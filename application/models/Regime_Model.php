<?php
class Regime_Model extends CI_Model
{
    public function createRegime($idRegime, $idActivite, $jourActivite, $finActivite){
        $data = array(
            'idRegime' => $idRegime,
            'idActivite' => $idActivite,
            'jourActivite' => $jourActivite,
            'finActivite' => $finActivite
        );
    
        $result = $this->db->insert('Regime', $data);
    
        if($result){
            return true;
        }else{
            return false;
        }
    }
    
    public function getRegimes()
    {
        $query = $this->db->get('Regime');
    
        if($query->num_rows() > 0){
            return $query->result_array();
        }else{
            return array();
        }
    }
    public function getSuggestionRegime()
    {

    }

    public function getPrixParDuree($idRegime)
    {
        $sql = "SELECT SUM(prix) AS prixTotal FROM activite JOIN regime ON activite.idActivite = regime.idActivite WHERE idRegime = '$idRegime'";
        $query = $this->db->query($sql);
        $row = $query->row_array();
    
        if ($row) {
            return $row['prixTotal'];
        } else {
            return 0;
        }
    }
    public function getLastRegime()
    {
        $sql= "select max(idregime) as lastIdRegime from regime";
        $query = $this->db->query($sql);
        $row = $query->row_array();
    
        if ($row) {
            return $row['lastIdRegime'];
        } else {
            return 0;
        }
    }

}
?>
