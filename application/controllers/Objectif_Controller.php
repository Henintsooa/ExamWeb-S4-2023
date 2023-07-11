<?php
class Objectif_Controller extends CI_Controller {

    public function insertobjectif(){
        header('Access-Control-Allow-Origin: * ');
        
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