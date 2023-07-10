<?php
class Home_Controller extends CI_Controller {

    public function index(){
        session_start();

        if(isset($_SESSION['userdata'])){

            $viewData['userdata'] = $_SESSION['userdata'];
            $this->load->view('home_view', $viewData);

        }else{
            redirect('welcome');
        }
        
    }

    public function login(){
        $this->load->view('login_view');
    }

}