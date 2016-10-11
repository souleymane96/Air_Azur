<?php

function creerPdfReservation($reservation){
    
    require('fpdf/fpdf.php');
    
    $pdf=new FPDF();
    
    $pdf->AddPage();
    
    $pdf->Image("image/aire_alliance.png",0,0,100,100);
    $pdf->Ln(90);
    $pdf->SetFont('Arial','B',16);
    
    $pdf->Cell(10,10,"Reservation");
     $pdf->Ln();
     
    $pdf->SetFont('Arial','',10);
    
    $pdf->Cell(10,10,"Client :".$reservation['nom']);
    $pdf->Ln();
    
     $pdf->SetFont('Arial','',10);
  
    $pdf->Cell(10,10,"Vol numero :".$reservation['numero']);
    $pdf->Ln();
   
     $pdf->SetFont('Arial','',10);
    $pdf->Cell(10,10,"Nombres passagers :".$reservation['nbrVoyageur']);
    $pdf->Ln();
    
    $pdf->Output();
    
}
?>