<?php
class Profile_Controller extends CI_Controller {


    public function CheckLogin() {
        header('Access-Control-Allow-Origin: * ');
    
        $this->load->model('Profile_Model');

        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $result = $this->Profile_Model->checkLogin($username, $password);

        if ($result) {
            session_start();

            $userdata = $this->Profile_Model->getProfileData($username)[0];
            if(empty($userdata)){
                echo 'error' ;
            }

            $_SESSION['userdata'] = $userdata ;
            echo 'success';
        } else {
            echo 'error';
        }
    }

    public function CheckSignUp() {
        header('Access-Control-Allow-Origin: * ');
    
        $this->load->model('Profile_Model');

        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $result = $this->Profile_Model->createProfile($username, $password);

        if ($result) {
            session_start();

            $userdata = $this->Profile_Model->getProfileData($username)[0];
            if(empty($userdata)){
                echo 'error' ;
            }

            $_SESSION['userdata'] = $userdata ;
            echo 'success';

        } else {
            echo 'error';
        }
    }

}
