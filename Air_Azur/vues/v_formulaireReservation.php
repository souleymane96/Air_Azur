<form method='POST' action="index.php?action=validerReservation">
    
    <fieldset>
        
   
        <legend> <?php echo $numero ;?></legend>
        <p>
    <label>Nom</label> <input type="text" name="nom" value="" />
        </p>
        <p>
    <label>Prenom</label><input type="text" name="prenom" value="" />
        </p>
        
        <p>
    <label>Adresse</label><input type="text" name="adresse" value="" />
        </p>
        <p>
    <label>Email</label><input type="email" name="email" value="" />
        </p>
        
        <p>
    <label>Nombre de voyageurs </label><input type="text" name="nbrVoyageur" value="" />
        </p>
    <input type="submit" value="Valider" />
    <input type="hidden" name="numero" value="<?php echo $numero ?>"/>
    
    <input type="reset" value="Annuler" />
     </fieldset>
</form>