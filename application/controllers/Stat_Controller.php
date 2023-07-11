<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stat_Controller extends CI_Controller {
	public function index()
	{
        $this->load->model('Regime_Model');
        $this->load->model('UserData_Model');

        $viewData['regimeMax'] = $this->Regime_Model->getRegimeMaxUtilise();
        $viewData['nbrVente']=$this->Regime_Model->getNbrVente();
        $viewData['nbrHomme'] = $this->UserData_Model->getStatistiqueMale();
        $viewData['nbrFemme'] = $this->UserData_Model->getStatistiqueFemale();

        $this->load->view('statistique_view', $viewData);
	}		
}
