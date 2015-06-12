<!DOCTYPE html>
<html>
    <head>
      
        <meta charset="utf-8" />
        <title>Créer un Produit</title>
		<link rel="stylesheet" href="ListeProduit.css" />
		
		<!--Pour faire mdp http://www.phpdebutant.org/article56.php-->
		
    </head>

    <body>
	
	
	
	<h1>Créer un Produit</h1>
	
	<form  action="EnvoieProduit.php" method="post">
	<p><label for="ajouterProduit">Nom : </label><input type="text" name="nomAjouterProduit" id="nomAjouterProduit1" size="35" maxlength="200"  value="Nom du produit" required="required"></p>
	<p><label for="ajouterProduit">Prix : </label><input type="text" name="prixAjouterProduit" id="prixAjouterProduit1" size="35" maxlength="200"  value="Prix du produit" required="required"></p>
	<p><label for="ajouterProduit">Quantitee : </label><input type="text" name="quantiteeAjouterProduit" id="quantiteeAjouterProduit1" size="35" maxlength="200"  value="Quantitee du produit" required="required"></p>
	<p><label for="ajouterProduit">Lieu d'origine: </label><input type="text" name="lieuAjouterProduit" id="lieuAjouterProduit1" size="35" maxlength="200"  value="Origine" required="required"></p>
	<p><label for="ajouterProduit">Pays d'origine : </label><input type="text" name="paysAjouterProduit" id="paysAjouterProduit1" size="35" maxlength="200"  value="Origine" required="required"></p>
	<p><label for="ajouterProduit">Commentaire : </label><input type="text" name="commentaireAjouterProduit" id="commentaireAjouterProduit1" size="35" maxlength="200"  value="Commentaire sur le Produit" required="required"></p>
	<p><label for="ajouterProduit">Conseil de cueillette : </label><input type="text" name="conseilAjouterProduit" id="conseilAjouterProduit1" size="35" maxlength="200"  value="Conseil pour cueillir le produit" required="required"></p>
	<p><label for="ajouterProduit">Date disponibilite debut : </label><input type="date" name="debutAjouterProduit" id="debutAjouterProduit1" size="35" maxlength="200"  value="Debut disponibilite" required="required"></p>
	<p><label for="ajouterProduit">Date disponibilite fin : </label><input type="date" name="finAjouterProduit" id="finAjouterProduit1" size="35" maxlength="200"  value="Fin disponibilite" required="required"></p>
	

 
    <label for="categorieMere">Choisissez la catégorie du produit :</label><br />
	<br />
     <select name="categorieProduit" id="categorieProduit1" size="4">
 
		<?php
 $bdd = new PDO('mysql:host=88.175.12.41:3306;dbname=BaseGrandParc;charset=utf8', 'devpi', 'Codeisc00l');//Faireune variable session qui contient bdd

	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	
		$reponse = $bdd->query('SELECT * FROM Type;');
 
			while ($donnees = $reponse->fetch())
				{
		?>
           <option value="<?php echo $donnees['NOM']; ?>"> <?php echo $donnees['NOM']; ?>
		<?php
				}
 
		?>
	</select>
	
		<br />
			<br />
	 <label for="categorieMere">Choisissez l'espèce du produit :</label><br />
	<br />
     <select name="especeProduit" id="especeProduit1" size="4">
 
		<?php
 $bdd = new PDO('mysql:host=88.175.12.41:3306;dbname=BaseGrandParc;charset=utf8', 'devpi', 'Codeisc00l');//Faireune variable session qui contient bdd

	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	
		$reponse = $bdd->query('SELECT * FROM Espece;');
 
			while ($donnees = $reponse->fetch())
				{
		?>
           <option value="<?php echo $donnees['NOM']; ?>"> <?php echo $donnees['NOM']; ?>
		<?php
				}
 
		?>
	</select>

	
		<br />
			<br />
	
	<input type="submit" value="Créer" name="valider"/> 
	<input type="button" name="annuler" value="Annuler" onclick="self.location.href='ListeProduit.php'" style="background-color:#3cb371" style="color:white; font-weight:bold"> 
	
	
<!-- propser un moyen avec une liste d'ajouter des produits a cette categorie a partir de cette page-->
	</form>
	 <br />
	<a href="Accueil.html">Accueil</a>
	
	</body>
	
	
	</html>