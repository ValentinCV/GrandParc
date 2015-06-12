<!DOCTYPE html>
<html>
    <head>
      
        <meta charset="utf-8" />
        <title>Supprimer Produit</title>
		<link rel="stylesheet" href="ListeProduit.css" />
		
		<!--Pour faire mdp http://www.phpdebutant.org/article56.php-->
		
    </head>

    <body>
	
	
	
	<?php
	
	
	
	
	$bdd = new PDO('mysql:host=88.175.12.41:3306;dbname=BaseGrandParc;charset=utf8', 'devpi', 'Codeisc00l');//Faireune variable session qui contient bdd

	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
		$produit=$_POST['produit'];
		if($_POST['supprimer']=="Supprimer")
		{
			echo $produit;
			$reponse = $bdd->query("SELECT ORIGINE,DISPONIBILITE FROM Produit Where NOM=('$produit');");//Faudrait mettre la colonne produuit nom en unique
			$id= $reponse -> fetch();
			$idOrigine=(int) $id['ORIGINE'];
			$idDispo=(int) $id['DISPONIBILITE'];
			$bdd->query("DELETE FROM Produit Where NOM=('$produit');");
			$bdd->query("DELETE FROM Origine Where ID=('$idOrigine');");//marche mais attention contrainte fk
			$bdd->query("DELETE FROM Disponibilite Where ID=('$idDispo');");
				
		}

		else
		{
			header('Location: FicheProduit.php?produit='.$produit);
			 exit();
		}
	header('Location: ListeProduit.php');
 exit();
	
	?>
	
	</body>
	
	
	</html>