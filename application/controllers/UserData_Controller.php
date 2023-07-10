<?php
class UserData_Controller extends UserData_Controller
{
    public function insertuserdata(){
        session_start();

        $idProfile = $_SESSION['userdata']['idProfile'] ;
        $sexe = $this->input->post('sexe');
        $taille = $this->input->post('taille');
        $poids = $this->input->post('poids');
        $dateCurrent = $this->input->post('dateCurrent');

        $result = $this->Code_Model->createUserData($idProfile, $sexe, $taille, $poids, $dateCurrent);

        if($result){
            echo 'success';
        }else{
            echo 'success';
        }
    }
}