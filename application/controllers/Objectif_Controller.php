<?php
class Objectif_Controller extends CI_Controller {

    public function insertobjectif(){
        header('Access-Control-Allow-Origin: * ');
        session_start();

        $this->load->model("Objectif_Model");

        $idRegime = $this->input->get('idRegime');
        $apport = $this->input->get('apport');
        $montant = $this->input->get('montant');
        $repetition = $this->input->get('repetition');

        $result = $this->Objectif_Model->createObjectif($_SESSION['userdata']['idProfile'],$idRegime, $apport, $montant, $repetition);
        if($result){
            redirect("Pdf_Controller?idregime=".$idRegime."&=montant=".$montant."&=repetition=".$repetition);
        }else{
            redirect("Home_Controller/loadFrontOffice");
        }

    }

    public function getsuggestions(){
        header('Access-Control-Allow-Origin: * ');

        $this->load->model("Regime_Model");
        $poids = $this->input->post('objectif');


        $suggestions = $this->Regime_Model->getSuggestionRegime($poids);

        if(!empty($suggestions)){

            header('Content-Type: application/json');
            echo json_encode($suggestions);
            
        }else{
            echo "error";
        }
    }

}