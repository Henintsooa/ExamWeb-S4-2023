<?php
class Home_Controller extends CI_Controller {

    public function index(){
        session_start();

        if(isset($_SESSION['userdata'])){

            $viewData['userdata'] = $_SESSION['userdata'];

            if( $viewData['userdata']['privilege'] == 1 ){

                redirect('home_controller/loadbackoffice');

            }else{
                redirect('home_controller/loadfrontoffice');
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

        $viewData['data'] = array();
        $this->load->view('code_view', $viewData);
    }

    public function loadFrontOffice(){
        session_start();

        $viewData['userdata'] = $_SESSION['userdata'];
        $this->load->view('frontoffice_view', $viewData);

    }

}