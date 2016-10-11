<?php
?>
<table border="1">
    
    <tr>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Numéro de vol</th>
        <th>Nbrs places</th>
        <th>PDF</th>
    </tr>
   
    <?php foreach ($lesReservations as $k =>$uneReservation): ?>
    
    <tr>
        <td><?php echo $uneReservation['nom'] ?></td>
        <td><?php echo $uneReservation['prenom'] ?></td>
        <td><?php echo  $uneReservation['numero'] ?></td>
        <td><?php echo $uneReservation['nbrVoyageur']?></td>
        <td><a href='index.php?action=pdfReservation&numReservation=<?php echo $k; ?>'><img src='image/unnamed.png' width="50px"/></a></td>
    </tr>
   
  <?php endforeach ;?>
    
</table>


