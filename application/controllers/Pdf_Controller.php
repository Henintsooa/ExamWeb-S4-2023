<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pdf_Controller extends CI_Controller {
	public function index()
	{
       // Charger la bibliothèque Pdf
        $this->load->library('pdf');

        // Instancier la classe PDF
        $pdf = new Pdf();
        $pdf->AliasNbPages();
        $pdf->AddPage();

        // Définir les en-têtes
        $header = array('Regime', 'Nom', 'Apport en kg', 'Frequence', 'Prix en Ar');
        $pdf->setHeader($header);

        // Définir le titre
        $title = 'Regimes et activites sportives';
        $pdf->setTitle($title);

        // Charger le modèle Regime_Model
        $this->load->model('Regime_Model');
        $data = $this->Regime_Model->getActivitesRegimes(1);
        $pdf->setData($data);

        
        // Appeler la méthode ImprovedTable()
        $pdf->ImprovedTable();

        // Afficher le PDF
        $pdf->Output();

    }		
}
