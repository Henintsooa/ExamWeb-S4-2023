<?php
class Home_Controller extends CI_Controller {

    public function index(){
        session_start();

        if(isset($_SESSION['userdata'])){

            $viewData['userdata'] = $_SESSION['userdata'];

            if( $viewData['userdata']['privilege'] == 1 ){

                redirect('Home_Controller/loadbackoffice');

            }else{
                redirect('Home_Controller/loadfrontoffice');
            }             
        }else{
            redirect('welcome');
        }
        
    }

    public function login(){
        $this->load->view('login_view');
    }

    public function loadBackOffice(){
        // get all activity
        $this->load->model('TypeActivite_Model');
        $this->load->model('Activite_Model');
        $this->load->model('Regime_Model');

        $viewData['typeActivites'] = $this->TypeActivite_Model->getTypeActivites(); 
        $viewData['activites'] = $this->Activite_Model->getActivites();
        $viewData['regimes'] = $this->Regime_Model->getRegimes();

        $this->load->view('backoffice_view', $viewData);
    }

    public function loadCodeInterface(){

        $this->load->model('PendingWallet_Model');
        $viewData['pendings'] = $this->PendingWallet_Model->getPendingWalletDetails();

        $this->load->view('code_view', $viewData);

    }

    public function loadFrontOffice(){
        session_start();
        
        $this->load->model("Code_Model");

        $viewData['userdata'] = $_SESSION['userdata'];
        $viewData['codes'] = $this->Code_Model->getCodeValid($_SESSION['userdata']['idProfile']);

        $this->load->view('frontoffice_view', $viewData);

    }
    public function deconnexion()
	{
        $this->load->model("Profile_Model");
        $this->Profile_Model->deconnexion();
        redirect('welcome');
	}	
}