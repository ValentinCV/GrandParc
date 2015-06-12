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
	
	

	$nom=$_POST['nomAjouterProduit'];
	$prix=(int) $_POST['prixAjouterProduit'];
	$quantitee=(int) $_POST['quantiteeAjouterProduit'];
	$commentaire= $_POST['commentaireAjouterProduit'];
	$conseil=$_POST['conseilAjouterProduit'];
	$fin= $_POST['finAjouterProduit'];
	$debut= $_POST['debutAjouterProduit'];
	$lieu= $_POST['lieuAjouterProduit'];
	$pays= $_POST['paysAjouterProduit'];
	$espece=$_POST['especeProduit'];
	$type= $_POST['categorieProduit'];
	
	
	
				$idEspece=$bdd->query("SELECT ID FROM Espece WHERE NOM=('$espece');" );
				$idEspece=$idEspece->fetch();
		$idEspece=(int) $idEspece['ID'];
		
		
		
		$idType=$bdd->query("SELECT ID FROM Type WHERE NOM=('$type');" );
				$idType=$idType->fetch();
		$idType=(int) $idType['ID'];
	
	
		$bdd->query("INSERT INTO `Disponibilite` (`ID` ,`DATE_DEBUT`,`DATE_FIN`) VALUES (NULL ,  ('$debut'), ('$fin'));");
			$idDisponibilite=$bdd->query("SELECT MAX(ID) FROM Disponibilite;" );
		$idDispo= $idDisponibilite->fetch();
	$idDispo=(int) $idDispo[0];
		
		
		$bdd->query("INSERT INTO `Origine` (`ID` ,`LIEU`,`PAYS`) VALUES (NULL ,  ('$lieu'), ('$pays'));");
			$idOrigine=	$bdd->query("SELECT MAX(ID) FROM Origine;" );
		$idOrigine= $idOrigine->fetch();
		$idOrigine=(int) $idOrigine[0];
		//BUG A CAUSE DE MAX ID JE NE CONNAIS PAS LE NOM DE LA CASE
		

		//Si il veut supprimmer categorie demander si il veut supprimmer les sous et produit ou replacer les produit

	$bdd->query("INSERT INTO `Produit` (`ID` ,`NOM`,`PRIX`,`ORIGINE` ,`QUANTITEE` ,`COMMENTAIRE` ,`CONSEIL_DE_CUEILLETTE` ,`PHOTO`,`TYPE` ,`ESPECE` ,`DISPONIBILITE`)VALUES (NULL ,  ('$nom'),('$prix'), ('$idOrigine'), ('$quantitee'), ('$commentaire'), ('$conseil'), 0, ('$idType'), ('$idEspece'), ('$idDispo'));");

	echo "Le produit a été crée";
	header('Location: ListeProduit.php');
  exit();
	
	?>
	
	</body>
	
	
	</html>