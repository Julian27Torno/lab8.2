<?php

namespace App\Outputs;

use App\Outputs\ProfileFormatter;
use Fpdf\Fpdf;

class PDFFormat implements ProfileFormatter
{
    private $pdf;

    public function setData($profile)
    {
        $this->pdf = new Fpdf();
        $this->pdf->AddPage();
        $this->pdf->SetFont('Arial', 'B', 16);
        $this->pdf->Cell(0, 10, 'Founder: ' . $profile->getFounder(), 0, 1, 'C');
        $this->pdf->Ln(5); 

    
        if ($profile->getImage()) {
           
            $pageWidth = $this->pdf->GetPageWidth();
            $imageWidth = 60; 
            $xPosition = ($pageWidth - $imageWidth) / 2; 

            
            $this->pdf->Image($profile->getImage(), $xPosition, $this->pdf->GetY(), $imageWidth);
            $this->pdf->Ln(50); 
        }

        
        $this->pdf->Ln(30); 

        $this->pdf->SetFont('Arial', '', 12);

        
        foreach ($profile->getSections() as $section) {
        
            $this->pdf->SetFont('Arial', 'B', 14);
            $this->pdf->Cell(0, 10, $section['title'], 0, 1);
            
          
            $this->pdf->SetFont('Arial', '', 12);
            foreach ($section['paragraphs'] as $paragraph) {
                $this->pdf->MultiCell(0, 10, $paragraph);
                $this->pdf->Ln(5); 
            }
        }
    }

    public function render()
    {
       
        return $this->pdf->Output();
    }
}
