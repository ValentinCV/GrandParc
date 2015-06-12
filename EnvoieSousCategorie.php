<!DOCTYPE html>
<html>
    <head>
      
        <meta charset="utf-8" />
        <title>Envoie Sous Categorie</title>
		<link rel="stylesheet" href="ListeProduit.css" />
		
		<!--Pour faire mdp http://www.phpdebutant.org/article56.php-->
		
    </head>

    <body>
	
	
	
	<?php
	
	
	
	
	$bdd = new PDO('mysql:host=88.175.12.41:3306;dbname=BaseGrandParc;charset=utf8', 'devpi', 'Codeisc00l');//Faireune variable session qui contient bdd

	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	

	$nomSousCategorie=$_POST['ajouterSousCategorie'];
	$nomCategorie=$_POST['categorieMere'];
	$id=$bdd->query("SELECT ID FROM Type WHERE NOM=('$nomCategorie');");
	$idCategorie=$id->fetch();
	$idCategorie=(int) $idCategorie['ID'];

	echo $nomSousCategorie;
	echo $idCategorie;
	
	$bdd->query("INSERT INTO `Espece` (`ID` ,`NOM`,`TYPE` )VALUES (NULL ,  ('$nomSousCategorie'), ('$idCategorie'));");

	echo "La Sous catégorie $nomSousCategorie a été crée";
	header('Location: ListeProduit.php');
  exit();
	
	?>
	
	</body>
	
	
	</html>