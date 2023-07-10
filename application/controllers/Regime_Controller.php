<?php
class Regime_Controller extends CI_Controller {

    public function insertregime(){
        header('Access-Control-Allow-Origin: * ');

        $idRegime = $this->input->post('idregime');
        $idActivite = $this->input->post('idactivite');
        $jourActivite = $this->input->post('jourActivite');
        $finActivite = $this->input->post('finActivite');
        $nom = $this->input->post('nomregime');

        $this->load->model('Regime_Model');

        if($idRegime == 99999){ 
            $id = $this->Regime_Model->getLastRegime() ; 
            $idRegime = $id + 1 ; 
            var_dump($idRegime);
        }else{
            $regime = explode("/",$idRegime) ;
            $idRegime = $regime[0];
            $nom = $regime[1]; 
        }

        $result = $this->Regime_Model-> createRegime($idRegime, $idActivite, $jourActivite, $finActivite, $nom);

        if($result){
            echo 'success ' ;
        }else{
            echo 'error';
        }
    }
    
}