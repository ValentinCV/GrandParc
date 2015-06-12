<!DOCTYPE html>
<html>
    <head>
      
        <meta charset="utf-8" />
        <title>Modifier Produit</title>
		<link rel="stylesheet" href="ListeProduit.css" />
    </head>

    <body>
	
	<?php 
	
	session_start();
	
	
			$bdd = new PDO('mysql:host=88.175.12.41:3306;dbname=BaseGrandParc;charset=utf8', 'devpi', 'Codeisc00l');//Faireune variable session qui contient bdd

	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	

	
	
	/*Recupération des id du produit */
/*-------------------------------------------------*/	
	
	$ancienNom=$_SESSION['nomProduitSelect'];//doit etre unique ! et faire un addcslashes
	addslashes($ancienNom);
	$reponseIdProduit = $bdd->query("SELECT ID FROM Produit WHERE NOM=('$ancienNom');");
	$idProduit=$reponseIdProduit->fetch();
	$idProduit=$idProduit['ID'];	
	$idProduit=(int)$idProduit;
	
	$idEspece=$_SESSION['idEspeceProduitSelect'];
	$idType=$_SESSION['idTypeProduitSelect'];
	
	$reponseIdOrgine = $bdd->query("SELECT ORIGINE FROM Produit WHERE NOM=('$ancienNom');");
	$idOrigine=$reponseIdOrgine->fetch();
	$idOrigine=$idOrigine['ORIGINE'];
	$idOrigine=(int)$idOrigine;
	
	$reponseIdDisponibilite = $bdd->query("SELECT DISPONIBILITE FROM Produit WHERE NOM=('$ancienNom');");
	$idDisponibilite=$reponseIdDisponibilite->fetch();
	$idDisponibilite=$idDisponibilite['DISPONIBILITE'];
	$idDisponibilite=(int)$idDisponibilite;
	
	
	
	
	
/*-------------------------------------------------*/
	$ancienPrix=$_SESSION['prixProduitSelect'];
	$ancienQuantitee=$_SESSION['quantiteeProduitSelect'];
	$ancienCommentaire=$_SESSION['commentaireProduitSelect'];
	$ancienLieu=$_SESSION['lieuOrigineProduitSelect'];
	$ancienPays=$_SESSION['paysOrigineProduitSelect'];
	$ancienConseil=$_SESSION['conseilProduitSelect'];
	
	
	
	
	
	
	$ancienDisponibiliteDebut=$_SESSION['dateDebutProduitSelect'];
	$ancienDisponibiliteFin=$_SESSION['dateFinProduitSelect'];
	
	$nouveauNom=$_POST['nom'];
	addslashes($nouveauNom);
	$nouveauPrix=$_POST['prix'];
	$nouveauQuantitee=$_POST['quantitee'];	
	$nouveauCommentaire=$_POST['comm'];	
	$nouveauLieuOrigine=$_POST['lieuOrigine'];	
	$nouveauPaysOrigine=$_POST['paysOrigine'];
	$nouveauConseil=$_POST['conseil'];
	$nouveauDateDebut=$_POST['dateDebut'];
	$nouveauDateFin=$_POST['dateFin'];
	
	
	
	$nouveauEspece=$_POST['espece'];
	
	echo $nouveauEspece;

		$reponseIdNewEspèce = $bdd->query("SELECT ID FROM Espece WHERE NOM=('$nouveauEspece');");
	$nouveauIdEspèce=$reponseIdNewEspèce->fetch();
	$nouveauIdEspèce=$nouveauIdEspèce['ID'];
	echo $nouveauIdEspèce;
	$nouveauIdEspèce=(int)$nouveauIdEspèce;
	
	echo $nouveauIdEspèce;
	
	$nouveauCatégorie=$_POST['categorie'];
	$reponseIdNewCatégorie = $bdd->query("SELECT ID FROM Type WHERE NOM=('$nouveauCatégorie');");
	$nouveauIdCatégorie=$reponseIdNewCatégorie->fetch();
	$nouveauIdCatégorie=$nouveauIdCatégorie['ID'];
	$nouveauIdCatégorie=(int)$nouveauIdCatégorie;
	echo $nouveauIdCatégorie;

	
		
		
		
		
	if($ancienNom!=$nouveauNom)
	{
		$bdd->query("UPDATE Produit SET NOM=('$nouveauNom') WHERE ID=('$idProduit');");
		echo $nouveauNom;
	}
	if($ancienPrix!=$nouveauPrix)
	{
		$bdd->query("UPDATE Produit SET PRIX=('$nouveauPrix') WHERE ID=('$idProduit');");
		echo $nouveauPrix;
	}
	if($ancienCommentaire!=$nouveauCommentaire)
	{
		$bdd->query("UPDATE Produit SET COMMENTAIRE=('$nouveauCommentaire') WHERE ID=('$idProduit');");
		echo $nouveauCommentaire;
	}
	if($ancienQuantitee!=$nouveauQuantitee)
	{
		$bdd->query("UPDATE Produit SET QUANTITEE=('$nouveauQuantitee') WHERE ID=('$idProduit');");
		echo $nouveauQuantitee;
	}
	if($ancienConseil!=$nouveauConseil)
	{
		$bdd->query("UPDATE Produit SET CONSEIL_DE_CUEILLETTE=('$nouveauConseil') WHERE ID=('$idProduit');");
		echo $nouveauConseil;
	}
	
	if($ancienDisponibiliteDebut!=$nouveauDateDebut)
	{
		$bdd->query("UPDATE Disponibilite SET DATE_DEBUT=('$nouveauDateDebut') WHERE ID=('$idDisponibilite');");
		echo $nouveauDateDebut;
	}
	if($ancienDisponibiliteFin!=$nouveauDateFin)
	{
		$bdd->query("UPDATE Disponibilite SET DATE_FIN=('$nouveauDateFin') WHERE ID=('$idDisponibilite');");
		echo $nouveauDateFin;
	}
	if($ancienLieu!=$nouveauLieuOrigine)
	{
		$bdd->query("UPDATE Origine SET Lieu=('$nouveauLieuOrigine') WHERE ID=('$idOrigine');");
		echo $nouveauLieuOrigine;
	}
	if($ancienPays!=$nouveauPaysOrigine)
	{
		$bdd->query("UPDATE Origine SET PAYS=('$nouveauPaysOrigine') WHERE ID=('$idOrigine');");//doit recuperer id car sinon peut en changer plusieurs et voir si peut regourper requete
		echo $nouveauPaysOrigine;
	}

				$bdd->query("UPDATE Produit SET TYPE=('$nouveauIdCatégorie') WHERE ID=('$idProduit');");//doit recuperer id car sinon peut en changer plusieurs et voir si peut regourper requete
		$bdd->query("UPDATE Produit SET ESPECE=('$nouveauIdEspèce') WHERE ID=('$idProduit');");//doit recuperer id car sinon peut en changer plusieurs et voir si peut regourper requete

		header('Location: ListeProduit.php');
  exit();
	?>
	
	
	</body>
	
	</html>