<?php
class Regime_Model extends CI_Model
{
    public function createRegime($idRegime, $idActivite, $jourActivite, $finActivite, $nom)
    {
        if ($jourActivite > $finActivite || $nom == "") {
            return false;
        }
    
        $regimes = $this->getRegimesById($idRegime);
        if (!empty($regimes)) {
           
            $lastRegime = end($regimes);  // Récupérer le dernier régime
            $lastRegimeId = $lastRegime['idRegime'];
            $data = array(
                'finActivite' => $finActivite
            );
            $this->db->where('idRegime', $lastRegimeId);
            $this->db->update('Regime', $data);
        } else {
         
            $data = array(
                'idRegime' => $idRegime,
                'idActivite' => $idActivite,
                'jourActivite' => $jourActivite,
                'finActivite' => $finActivite,
                'nom' => $nom
            );
            $result = $this->db->insert('Regime', $data);
            if ($result) {
                return true;
            } else {
                return false;
            }
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
    
    public function getSuggestionRegime($poids)
    {
        $result = array();
    
        if ($poids > 0) {
            $sql = "SELECT idRegime, resultat FROM augmenterPoids";
            $query = $this->db->query($sql);
    
            foreach ($query->result_array() as $row) {
                $apport = $row['resultat'];
                $repetition = floor($poids / $apport);
                $resultat = $repetition*$apport;
                $result[] = array(
                    'idRegime' => $row['idRegime'],
                    'resultat' => $resultat,
                    'repetition' => $repetition
                );
            }
        } elseif ($poids < 0) {
            $sql = "SELECT idRegime, resultat FROM reduirePoids";
            $query = $this->db->query($sql);
        
            foreach ($query->result_array() as $row) {
                $apport = abs($row['resultat']);  // Utilisation de abs() pour obtenir la valeur absolue de $apport
                $repetition = floor($poids / $apport);
                $resultat = $repetition * (-1) * $apport;  // Multiplication négative ici
                $result[] = array(
                    'idRegime' => $row['idRegime'],
                    'resultat' => $resultat,
                    'repetition' => $repetition
                );
            }
        }
        
        
    
        return $result;
    }
    

    public function getPrixParDuree($idRegime)
    {
        $sql = "SELECT SUM(prix) AS prixTotal FROM activite JOIN regime ON activite.idActivite = regime.idActivite WHERE idRegime = '$idRegime'";
        $query = $this->db->query($sql);
        $row = $query->row_array();
    
        if (!empty($row)) {
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
    
        if (!empty($row)) {
            return $row['lastIdRegime'];
        } else {
            return 0;
        }
    }
    public function getRegimesById($id)
    {
        $this->db->where('idRegime', $id);
        $query = $this->db->get('Regime');
    
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }
    
    public function updateRegimeFinActivite($idRegime, $idActivite, $finActivite)
    {
        $data = array(
            'finActivite' => $finActivite
        );

        $this->db->where('idRegime', $idRegime);
        $this->db->where('idActivite', $idActivite);
        $this->db->update('Regime', $data);
    }
    public function getRegimeMaxUtilise()
    {
        $sql= "SELECT r.idRegime AS idRegime, r.nom AS nom, COUNT(*) AS totalUtilisations FROM Objectif o JOIN Regime r ON o.idRegime = r.idRegime  GROUP BY r.idRegime  ORDER BY totalUtilisations DESC LIMIT 5";
        $query = $this->db->query($sql);
        $result = $query->result_array();
    
        if (!empty($result)) {
            return $result;
        } else {
            return array();
        }
    }
    public function getNbrVente()
    {
        $sql = "select count(idObjectif) as nbrVente from objectif";
        $query = $this->db->query($sql);
        $row = $query->row_array();
    
        if (!empty($row)) {
            return $row['nbrVente'];
        } else {
            return 0;
        }
    }
}
?>
