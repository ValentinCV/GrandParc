  
<!DOCTYPE html>
<html>
    <head>
      
        <meta charset="utf-8" />
        <title>Liste Produit</title>
		<link rel="stylesheet" href="ListeProduit.css" />
		
	
    </head>

    <body>

	<?php
	
	session_start();
	try
{
	$bdd = new PDO('mysql:host=88.175.12.41:3306;dbname=BaseGrandParc;charset=utf8', 'devpi', 'Codeisc00l');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
//$nom=$_POST['produit'];

$nom=$_GET['produit'];
echo $nom;
$nom=addslashes($nom);
$_SESSION['nomProduitSelect']=$nom;

try
{

$reponse = $bdd->query("SELECT * FROM Produit WHERE NOM=('$nom');");
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
$nom=$reponse->fetch();




$nomProduit=$nom['NOM'];
$prixProduit=$nom['PRIX'];

$origineProduit=$nom['ORIGINE'];
$origineProduit=(int)$origineProduit;

$reponse = $bdd->query("SELECT * FROM Origine WHERE ID=('$origineProduit');");
$origineProduit=$reponse->fetch();
$commentaireProduit=$nom['COMMENTAIRE'];
$idDisponibilite=$nom['DISPONIBILITE'];
$reponseDispo = $bdd->query("SELECT * FROM Disponibilite WHERE ID=('$idDisponibilite');");
$disponibilite=$reponseDispo->fetch();


$_SESSION['prixProduitSelect']=$prixProduit;
$_SESSION['lieuOrigineProduitSelect']=$origineProduit['LIEU'];
$_SESSION['paysOrigineProduitSelect']=$origineProduit['PAYS'];
$_SESSION['commentaireProduitSelect']=$nom['COMMENTAIRE'];
$_SESSION['dateDebutProduitSelect']=$disponibilite['DATE_DEBUT'];
$_SESSION['dateFinProduitSelect']=$disponibilite['DATE_FIN'];
$_SESSION['quantiteeProduitSelect']=$nom['QUANTITEE'];
$_SESSION['conseilProduitSelect']=$nom['CONSEIL_DE_CUEILLETTE'];
$_SESSION['idEspeceProduitSelect']=$nom['ESPECE'];
$_SESSION['idTypeProduitSelect']=$nom['TYPE'];








//[php]<input type="text" name="nom" value="valeur"<?php echo ($condition == true) ? ' selected="selected"' : ''; 
//select type du produit et dans boucle si ligne == type alors selected sinon pas selected

?>
	
	
	
	<FORM  method="post" action="ModifierProduit.php">

<p><label for="nom">Nom : </label><input type="text" name="nom" id="nom1" size="35" maxlength="50"  value="<?php echo $nom['NOM']?>" required="required"></p>
<p><label for="poids">Prix : </label><input type="text" name="prix" id="prix1" size="35" maxlength="50"  value="<?php echo $nom['PRIX']?>" required="required"></p>
<p><label for="comm">Commentaire Produit : </label><input type="text" name="comm" id="comm1" size="35" maxlength="50"  value="<?php echo $nom['COMMENTAIRE']?>" required="required"></p>
<p><label for="lieuOrigine">Lieu Origine : </label><input type="text" name="lieuOrigine" id="lieuOrigine1" size="35" maxlength="50"  value="<?php echo $origineProduit['LIEU']?>" required="required"></p>
<p><label for="paysOrigine">Pays d'Origine : </label><input type="text" name="paysOrigine" id="paysOrigine1" size="35" maxlength="50"  value="<?php echo $origineProduit['PAYS']?>" required="required"></p>
<p><label for="quantitee">Quantitee : </label><input type="text" name="quantitee" id="quantitee1" size="35" maxlength="50"  value="<?php echo $nom['QUANTITEE']?>" required="required"></p>
<p><label for="conseil">Conseil de récolte : </label><input type="text" name="conseil" id="conseil1" size="35" maxlength="50"  value="<?php echo $nom['CONSEIL_DE_CUEILLETTE']?>" required="required"></p>





  <label for="categorie">Categorie :</label><br />
   
	<br />
     <select name="categorie" id="espece1" size="1">

<?php
 //Liste catégorie avec selection de la categorie actuelle du produit
 

 
 $reponseE = $bdd->query("SELECT * FROM Type;");

 
while ($donnees = $reponseE->fetch())
{

if($donnees['ID']==$nom['TYPE'])
{
?>
<option selected="selected" value="<?php echo $donnees['NOM']; ?>"> <?php echo $donnees['NOM']; ?>
<?php
}
else
{
?>
<option value="<?php echo $donnees['NOM']; ?>"> <?php echo $donnees['NOM']; ?>
<?php
}
}
 
?>
</select>

<br />


 
    <label for="espece">Espèce :</label><br />
	<br />
     <select name="espece" id="espece1" size="1">

<?php
 //Liste produit
 

 
 $reponseE = $bdd->query("SELECT * FROM Espece ;");

 
while ($donnees = $reponseE->fetch())
{
if($donnees['ID']==$nom['ESPECE'])
{
?>
<option selected="selected" value="<?php echo $donnees['NOM']; ?>"> <?php echo $donnees['NOM']; ?>
<?php
}
else
{
?>
<option value="<?php echo $donnees['NOM']; ?>"> <?php echo $donnees['NOM']; ?>
<?php
}
}


//changer disponibilité en non null
 //pas bonne solution car cela propose toute les sous espèces et si il en choisit une d'un autre catégorie la categorien'est pas mis a jour !
?>
</select>


<p><label for="dateDebut">Date Debut : </label><input type="date" name="dateDebut" id="dateDebut1" size="35" maxlength="50"  value="<?php echo $disponibilite['DATE_DEBUT']?>" required="required"></p>
<p><label for="dateDebut">Date Fin : </label><input type="date" name="dateFin" id="dateFin" size="35" maxlength="50"  value="<?php echo $disponibilite['DATE_FIN']?>" required="required"></p>

<input type="submit" value="Valider" name="valider"/> 
<input type="button" name="annuler" value="Annuler" onclick="self.location.href='ListeProduit.php'" style="background-color:#57D53B" style="color:white; font-weight:bold"> 
<input type="reset" value="Reset" name="reset"  /> 
 <input type="submit" value="Supprimer" name="su" /> 
</FORM>


<?php


?>



	</body>
	
	
	
</html>