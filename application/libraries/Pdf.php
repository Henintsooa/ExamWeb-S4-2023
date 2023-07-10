<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH . 'third_party/fpdf/fpdf.php');


class PDF extends FPDF
{
    private $data;
    private $header;
    private $title;

    public function setData($data) {
        $this->data = $data;
    }

    public function setHeader($header) {
        $this->header = $header;
    }

    function setTitle($title, $isUTF8 = false) {
        parent::SetTitle($title, $isUTF8);
    }


    // En-tête
    function Header()
    {
        // Logo
        $this->SetFont('Times','B',10);
        $this->SetTextColor(196, 201, 199);
        // Décalage à droite
        $this->Cell(130);
        // Titre
        $this->Cell(30, 10, '', 0, 0, 'C');
        $this->Ln(5);
        // Police Times gras 15
        $this->SetFont('Times','B',13);
        $this->SetTextColor(34, 66, 124);
        // Décalage à droite
        $this->Cell(80);
        // Titre
        $this->Cell(30, 40, $this->title, 0, 0, 'C');
        
        // Saut de ligne
        $this->Ln(27);
    }

    // Pied de page
    function Footer()
    {
        // Positionnement à 1,5 cm du bas
        $this->SetY(-15);
        // Police Times italique 8
        $this->SetFont('Times','I',8);
        // Numéro de page
        $this->Cell(0, 10, 'Page '.$this->PageNo().'/{nb}', 0, 0, 'C');
    }

    function LoadData()
    {
        // Lecture des lignes du fichier
        $this->data = $data;
    }

    // Tableau amélioré
    function ImprovedTable()
    {
        // Largeurs des colonnes
        $w = array(30, 40, 40, 40, 40);
        // En-tête
        for($i = 0; $i < count($this->header); $i++)
            $this->Cell($w[$i], 7, $this->header[$i], 1, 0, 'C');
        $this->Ln();
        // Données
        foreach($this->data as $row)
        {
            $this->Cell($w[0], 7, $row['regime'], 1);
            $this->Cell($w[1], 7, $row['nom'], 1);
            $this->Cell($w[2], 7, $row['apport'], 1);
            $this->Cell($w[3], 7, $row['frequence'], 1);
            $this->Cell($w[4], 7, $row['prix'], 1);
            $this->Ln();
        }
    }
}

?>