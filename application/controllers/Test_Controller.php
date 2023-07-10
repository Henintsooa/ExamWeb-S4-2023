<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test_Controlller extends CI_Controller {
	public function index()
	{
        $this->load->model('TypeActivite_Model');
        $result = $this->TypeActivite_Model->createTypeActivite("sport");

	}		
}
