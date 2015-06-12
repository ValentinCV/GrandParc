<!DOCTYPE html>
<html>
    <head>
      
        <meta charset="utf-8" />
        <title>Envoie Categorie</title>
		<link rel="stylesheet" href="ListeProduit.css" />
		
		<!--Pour faire mdp http://www.phpdebutant.org/article56.php-->
		
    </head>

    <body>
	
	
	
	<?php
	
	
	
	
	$bdd = new PDO('mysql:host=88.175.12.41:3306;dbname=BaseGrandParc;charset=utf8', 'devpi', 'Codeisc00l');//Faireune variable session qui contient bdd

	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	

	$nomCategorie=$_POST['ajouterCategorie'];

	$bdd->query("INSERT INTO `Type` (`ID` ,`NOM` )VALUES (NULL ,  ('$nomCategorie'));");

	echo "La catégorie $nomCategorie a été crée";
	header('Location: ListeProduit.php');
  exit();
	
	?>
	
	</body>
	
	
	</html>