


<div id="">
    
    <div id="afficheVols">
        
        <h1> Catalogue des vols </h1>
        <?php foreach ($lesVols as $unVol) {


            echo "Vol : ".'<strong>'.$unVol['numero'].'</strong>';
            echo '<br>';
            echo "Depart : ".$unVol['depart'];
            echo '<br>';
            echo "Arrivée : ".$unVol['arrivee'];
            echo "<br>";
            echo "<strong>prix : ".$unVol['prix']."</strong>";
            echo "<br>";
            $numeroVol = $unVol['numero'];
          
            echo "<a href=index.php?action=reserver&numero=$numeroVol>Réserver</a>";
            echo '<br>';
            echo '<br>';

        }

        ?>
    </pre>
</div>

