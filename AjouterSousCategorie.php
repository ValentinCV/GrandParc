<!DOCTYPE html>
<html>
    <head>
      
        <meta charset="utf-8" />
        <title>Créer une Sous-Catégorie</title>
		<link rel="stylesheet" href="ListeProduit.css" />
		
		<!--Pour faire mdp http://www.phpdebutant.org/article56.php-->
		
    </head>

    <body>
	
	
	
	<h1>Créer une Espèce</h1>
	
	<form  action="EnvoieSousCategorie.php" method="post">
	<p><label for="ajouterSousCategorie">Nom : </label><input type="text" name="ajouterSousCategorie" id="ajouterSousCategorie1" size="35" maxlength="200"  value="Nom de la catégorie" required="required"></p>
	

 
    <label for="categorieMere">Choisissez la catégorie mère :</label><br />
	<br />
     <select name="categorieMere" id="categorieMere1" size="4">
 
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

	
	
	
	<input type="submit" value="Créer" name="valider"/> 
	<input type="button" name="annuler" value="Annuler" onclick="self.location.href='ListeProduit.php'" style="background-color:#3cb371" style="color:white; font-weight:bold"> 
	
	
<!-- propser un moyen avec une liste d'ajouter des produits a cette categorie a partir de cette page-->
	</form>
	 <br />
	<a href="Accueil.html">Accueil</a>
	
	</body>
	
	
	</html>