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

    public function getcode(){
        session_start();

        $idCode = $this->input->get('id');

        $this->load->model('PendingWallet_Model');

        $result = $this->PendingWallet_Model->createPendingWallet($_SESSION['userdata']['idProfile'], $idCode, 0);

        if($result){
            redirect("Home_Controller/loadfrontoffice");
        }
    }

    public function accept(){
        $idCode = $this->input->get('idCode');
        $idProfile = $this->input->get('idProfile');

        $this->load->model('PendingWallet_Model');
        $this->load->model('Code_Model');

        $result_1 = $this->PendingWallet_Model->updatePendingWalletStatus($idProfile, $idCode, 1);
        $result_2 = $this->PendingWallet_Model->updatePendingWalletStatus('', $idCode, 2);
        $code = $this->Code_Model->getCodesByID($idCode);

        $this->Code_Model->ajoutSolde($code['montant'], $idProfile);
        $this->Code_Model->updateCodeStatus($idCode, 1);

        if($result_1 && $result_2){
            redirect("Home_Controller/loadCodeInterface");
        }
    }

    public function refuse(){
        $idCode = $this->input->get('idCode');
        $idProfile = $this->input->get('idProfile');

        $this->load->model('PendingWallet_Model');

        $result_1 = $this->PendingWallet_Model->updatePendingWalletStatus($idProfile, $idCode, 2);

        if($result_1){
            redirect("Home_Controller/loadCodeInterface");
        }
    }
}