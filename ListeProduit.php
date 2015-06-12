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

?>
	<div id='entete'>  
	   <h1>Liste Produit</h1>
	
	   
	</div>   
<div id="Global">	   
<div id='colonne1' > 

		<form method="post" >
 
    <label for="categorie">Catégorie :</label><br />
	<br />
     <select name="categorie" id="categorie1" size="4">
 
<?php
 
$reponse = $bdd->query('SELECT * FROM Type;');
 
while ($donnees = $reponse->fetch())
{
?>
           <option value="<?php echo $donnees['NOM']; ?>"> <?php echo $donnees['NOM']; ?>
<?php
}
 
?>
</select>
 <input type="submit" value=">" name="next" /> 
 <input type="submit" value="Supprimer" name="su" /> 
</form> 
<button class="bouton" onclick="self.location.href='AjouterCategorie.html'">Nouveau</button>

<?php 
 if(isset($_POST['su']) && $_POST['su']!="user")
     { 
	 
	 $nomCategorie = $_POST['categorie'];
	 $reponse = $bdd->query("SELECT ID FROM Type Where Nom = ('$nomCategorie');");
	$id=$reponse->fetch();
	$id=(int) $id['ID'];
	
	 $bdd->query("Delete from Produit where TYPE=('$id');");
	 $bdd->query("Delete from Espece where TYPE=('$id');");/*peut bugger si un produit a une sous espèce qui n'est pas de ce type*/
	 $bdd->query("Delete from Type where ID=('$id');");
		$_POST['su']!="user";
		  header('Location: ListeProduit.php');
  exit();
     }
 
  if(isset($_POST['categorie']) && !empty($_POST['categorie'])) 
     { 
	 
      $_SESSION['categorieChoisie']=htmlentities($_POST['categorie']); 
		  
     }
 
?>

<?php if(isset($_POST['next'])):

unset($_POST['next']);
$_SESSION['etape1']=true;

 ?>

<?php endif;?>


<br />
<br />
<br />
</div>
<div id='colonne2' > 
<?php if(isset($_POST['next']) || isset($_SESSION['etape1']) ):?>


<form method="post" >
 
  <label for="sousCategorie">Espèce :</label><br />
	<br />
     <select name="sousCategorie" id="sousCategorie1" size="4">
       
<?php 

 //Liste sous catégorie

$cate=$_SESSION['categorieChoisie'];
$idTypeChoisie= $bdd->query("SELECT ID FROM Type WHERE NOM=('$cate');");
$id=$idTypeChoisie->fetch();
$id = $id['ID'];
$id = (int)$id;
$reponse2 = $bdd->query("SELECT * FROM Espece WHERE TYPE=('$id');");
	
while ($donnees = $reponse2->fetch())
{
?>

           <option value="<?php echo $donnees['NOM']; ?>"> <?php echo $donnees['NOM']; ?>
<?php
}?>

</select>
  <input type="submit" value=">" name="suivant" />
   <input type="submit" value="Supprimer" name="su2" /> 
  
</form> 
<button  onclick="self.location.href='AjouterSousCategorie.php'">Nouveau</button>

<?php
endif;
?>





<?php 
 if(isset($_POST['su2']) && $_POST['su2']!="user")
     { 
	 
	 $nomSousCategorie = $_POST['sousCategorie'];
	 $reponse = $bdd->query("SELECT ID FROM Espece Where Nom = ('$nomSousCategorie');");
	$id=$reponse->fetch();
	$id=(int) $id['ID'];
	
	 $bdd->query("Delete from Produit where TYPE=('$id');");
	 $bdd->query("Delete from Espece where ID=('$id');");/*peut bugger si un produit a une sous espèce qui n'est pas de ce type*/
	 
		$_POST['su2']!="user";
		  header('Location: ListeProduit.php');
  exit();
     }
 
 
?>







	 
	 <br />
	 <br />
	 <br />
	 </div>
	 
	 <div id='colonne3' > 
<?php if(isset($_POST['suivant'])):

unset($_POST['suivant']);
?>
<form method="post" action="SupprimerProduit.php">
 
   <label for="produit">Liste des produits :</label><br />
	<br />
     <select name="produit" id="produit1" size="4" >

<?php
 //Liste produit
 
	$especeProduit=$_POST['sousCategorie'];
 
	$reponse3 = $bdd->query("SELECT ID FROM Espece WHERE NOM=('$especeProduit');");
	$idEspece=$reponse3->fetch();
	$idEspece=$idEspece['ID'];

$reponseP = $bdd->query("SELECT * FROM Produit WHERE ESPECE = ('$idEspece') ");
 
while ($donnees = $reponseP->fetch())
{
?>
           <option value="<?php echo $donnees['NOM']; ?>"> <?php echo $donnees['NOM']; ?>
<?php
}
 
?>
</select>
  <input type="submit" value=">" name="modifier" /> 
  <input type="submit" value="Supprimer" name="supprimer" /> 
  		

</form> 
<script>
function setValeur( val) {

ValeurChoisie=val;

}
</script>
<script>
function change( ) {


self.location.href='SupprimerProduit?produit=ValeurChoisie.php'

}



</script>
<?php
if (isset($_POST['ok']))
{
    
	header('Location: FicheProduit.php');
	
}

$reponse->closeCursor(); 

?>

	<p>
	   
	<!-- <button onclick="self.location.href='SupprimerProduit.php?produit=<?php echo $_POST['produit']?>'" >Supprimer</button> -->
	  <button onclick="self.location.href='NouveauProduit.php'">Nouveau</button>
	
	</p>
<?php endif; ?>	  
	  
	  
 
</div>	

</div>

<div id='piedPage'>
<br />
	<a href="Accueil.html" align="center">Accueil</a> <br />	
<br />	
	<button onclick="self.location.href='AjouterCategorie.html'">Nouvelle catégorie</button>
	<button onclick="self.location.href='AjouterSousCategorie.php'">Nouvelle espèce</button>
	<button onclick="self.location.href='NouveauProduit.php'">Nouveau Produit</button>
</div>
    </body>
	
	
	
</html>