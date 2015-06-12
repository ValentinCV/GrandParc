<!DOCTYPE html>
<html>
    <head>
      
        <meta charset="utf-8" />
        <title>Envoie de News</title>
		<link rel="stylesheet" href="ListeProduit.css" />
		
		<!--Pour faire mdp http://www.phpdebutant.org/article56.php-->
		
    </head>

    <body>
	
	
	
	<?php
	
	
	
	
	$bdd = new PDO('mysql:host=88.175.12.41:3306;dbname=BaseGrandParc;charset=utf8', 'devpi', 'Codeisc00l');//Faireune variable session qui contient bdd

	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	
	$titreNews=$_POST['titreNews'];
	$texteNews=$_POST['ecrireNews'];

	$bdd->query("INSERT INTO `News` (`ID` ,`TEXTE` ,`PRODUIT`,`TITRE`)VALUES (NULL ,  ('$texteNews'), NULL,('$titreNews'));");

	header('Location: Accueil.html');
  exit();
	?>
	
	</body>
	
	
	</html>