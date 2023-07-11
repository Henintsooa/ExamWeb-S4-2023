<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pdf_Controller extends CI_Controller {
	public function index()
	{
       // Charger la bibliothèque Pdf
        $this->load->library('pdf');
        $idRegime = $this->input->get("idregime");
        $montant = $this->input->get("montant");
        $repetition = $this->input->get("repetition");

        // Instancier la classe PDF
        $pdf = new Pdf();
        $pdf->AliasNbPages();
        $pdf->AddPage();

        // Définir les en-têtes
        $header["activites"] = array('Regime', 'Nom', 'Apport en kg', 'Frequence', 'Prix en Ar');
        $header["result"]= array('Montant','Duree');
        $pdf->setHeader($header);

        // Définir le titre
        $title = 'Regimes et activites sportives';
        $pdf->setTitle($title);

        // Charger le modèle Regime_Model
        $this->load->model('Regime_Model');
        $data['activites'] = $this->Regime_Model->getActivitesRegimes($idRegime);
        $data['result'] = array(
            "montant"=>$montant,
            "repetition"=>$repetition
        );
        $pdf->setData($data);

        
        // Appeler la méthode ImprovedTable()
        $pdf->ImprovedTable();

        // Afficher le PDF
        $pdf->Output();

    }		
}
