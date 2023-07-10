<?php
class Activite_Controller extends CI_Controller {

    public function insertregime(){

        $nom = $this->input->post('nom');
        $idtype = $this->input->post('idtype');
        $apport = $this->input->post('apport');
        $frequence = $this->input->post('frequence');
        $prix = $this->input->post('prix');

        if( $idtype == 1 ){
            $prix = 0;
        }

        $this->load->model('Activite_Model');

        $result = $this->Activite_Model-> createActivite($nom, $idtype, $apport, $frequence, $prix);

        if($result){
            echo 'success';
        }else{
            echo 'error';
        }
    }
    
}