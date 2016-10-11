<?php
function getLaReservation(){
    
    $numero = $_REQUEST['numReservation'];
    
  return $_SESSION['reservations'][$numero];
}