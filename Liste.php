

<!DOCTYPE html>
<html>
    <head>
      
        <meta charset="utf-8" />
        <title>Liste</title>
		<link rel="stylesheet" href="ListeProduit.css" />
		
		
    </head>

    <body>
	

	
<?php
// Sous WAMP (Windows)


try
{
	$bdd = new PDO('mysql:host=88.175.12.41:3306;dbname=BaseGrandParc;charset=utf8', 'devpi', 'Codeisc00l');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}


?>
<form method="post" action="FicheProduit.php">
 
    <label for="produit">Liste des produits :</label><br />
	<br />
     <select name="produit" id="produit1" size="4">
 
<?php
 
$reponse = $bdd->query('SELECT * FROM Produit');
 
while ($donnees = $reponse->fetch())
{
?>
           <option value="<?php echo $donnees['NOM']; ?>"> <?php echo $donnees['NOM']; ?></option> <button onclick="ClicBouton();">Voir / Modifier</button>
<?php
}
 
?>
</select>
  <input type="submit" value="ok" name="ok" /> 
</form> 

<?php
if (isset($_POST['ok']))
{
    echo 'Produit choisie : '.$_POST['produit'].'<br />';
	header('Location: FicheProduit.php');
	
}



$reponse->closeCursor(); 




?>
	  
	  </body>
	  
	  
	  </html>