<?php

echo "<div id='contenu'>"."La réservation pour le vol".$numero." est confirmée pour le client ".$prenom." ".$nom."</div>";
echo "<pre>";
var_dump($_SESSION);
echo '</pre>';
if (isset($error)){
    
    echo $error;
}
?>