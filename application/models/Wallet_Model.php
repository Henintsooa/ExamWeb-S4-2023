<?php 
class Wallet_Model extends CI_Model
{
    public function createWallet($idProfile, $montant){
        $data = array(
            'idProfile' => $idProfile,
            'montant' => $montant
        );
    
        $result = $this->db->insert('Wallet', $data);
    
        if($result){
            return true;
        }else{
            return false;
        }
    }
    
    public function getWallet($idProfile){
        $query = $this->db->get_where('Wallet', array('idProfile' => $idProfile));
    
        if($query->num_rows() === 1){
            return $query->result_array()[0];
        }else{
            return array();
        }
    }

    public function checkWallet($somme,$idProfile){
        $sql = "SELECT montant FROM Wallet where idProfile=$idProfile";
        $query = $this->db->query($sql);
        $result = $query->row();

            if ($result >= $somme) {
                $this->transaction($somme,$idProfile);
            } else {
                echo "Votre montant est insuffisant";
            }
    }
    public function transaction($somme,$idProfile)
    {
        $sql = "UPDATE Wallet SET montant = montant - $somme WHERE idProfile = $idProfile";
        $this->db->query($sql);
    }

}
?>