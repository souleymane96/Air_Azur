<?php
session_start();
require_once "modele/PdoAirAzur.php" ;
require_once 'modele/fonction.php';


$pdo = pdoAir::getPdoAir();

if (!isset($_REQUEST["action"])){
    
    $action = "accueil"; 
}
else {
    
    $action = $_REQUEST["action"];
}
if ($action != "pdfReservation"){
    require "vues/v_entete.php";
}
switch($action){
    
    
    case "accueil" :
        
        include "vues/v_accueil.php";

        break ;
        
    case "voirVols":

        $lesVols  = $pdo->getLesVols();
        
        include 'vues/v_vols.php';

        break ;
        
    case "reserver":
        
        $numero = $pdo->reserverVol();
        
        include 'vues/v_formulaireReservation.php';
        break ;
        
    case "validerReservation":
        
        $numero = $pdo->reserverVol();
        
        $reservation =   $pdo->creerReservation();
      
        if ($pdo->validerReservations($reservation)){

            $pdo->ajouterAuPanier($reservation);

        }
        else {
            $error = "Impossible de valider la reservation";
        }

          $nom = $_REQUEST['nom'];

          $prenom = $_REQUEST['prenom'];

       include 'vues/v_confirmeReservation.php';
       break;
        
        
    case "voirReservations":
        
        $lesReservations =  $pdo->getLesReservations();
        
        include 'vues/v_reservations.php';
        break;
    
    case 'pdfReservation':
        
        include 'vues/pdf_reservation.php';
        
        creerPdfReservation(getLaReservation());
        break;
}
if ($action != "pdfReservation"){
    require "vues/v_pied.php";
}
?>