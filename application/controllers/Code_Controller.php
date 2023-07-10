<?php
class Code_Controller extends CI_Controller
{
    public function insertcode(){

        $montant = $this->input->post('montant');
        $code = $this->input->post('code');
        
        $this->load->model('Code_Model');
        $result = $this->Code_Model->createCode($montant, 0, $code);

        if(true){
            echo 'success';
        }else{
            echo 'error';
        }
    }
}