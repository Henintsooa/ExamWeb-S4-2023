<?php
class UserData_Controller extends CI_Controller
{
    public function insertuserdata(){
        header('Access-Control-Allow-Origin: * ');
        session_start();

        $this->load->model('UserData_Model');

        $idProfile = $_SESSION['userdata']['idProfile'] ;
        $sexe = $this->input->post('sexe');
        $taille = $this->input->post('taille');
        $poids = $this->input->post('poids');
        $dateCurrent = $this->input->post('date');
 
        $result = $this->UserData_Model->createUserData($idProfile, $sexe, $taille, $poids, $dateCurrent);

        if($result){
            echo 'success';
        }else{
            echo 'error';
        }
    }
}