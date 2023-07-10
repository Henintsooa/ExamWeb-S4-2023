<?php
class Home_Controller extends CI_Controller {

    public function index(){
        session_start();

        if(isset($_SESSION['userdata'])){

            $viewData['userdata'] = $_SESSION['userdata'];

            if( $viewData['userdata']['privilege'] == 1 ){

                redirect('home_controller/loadbackoffice');

            }else{
                $this->load->view('home_view', $viewData);
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

        $viewData['typeActivites'] = $this->TypeActivite_Model->getTypeActivites(); 
        $viewData['activites'] = $this->Activite_Model->getActivites();

        $this->load->view('backoffice_view', $viewData);
    }

}