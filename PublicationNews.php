<!DOCTYPE html>
<html>
    <head>
      
        <meta charset="utf-8" />
        <title>Publie une News</title>
		<link rel="stylesheet" href="ListeProduit.css" />
		
		<!--Pour faire mdp http://www.phpdebutant.org/article56.php-->
		
    </head>

    <body>
	
	<h1>Publier une News</h1>
	
	<form  action="EnvoieNews.php" method="post">
	<p><label for="titreNews">Titre : </label><input type="text" name="titreNews" id="titreNews1" size="35" maxlength="200"  value="Titre de la news" required="required"></p>
	
	Texte de la News : </br> </br>
	<textarea name='ecrireNews' rows="4" cols="50" required autofocus maxlength="1000">
	Ecrire une news ...
	</textarea>
	
	<input type="submit" value="Envoyer" name="valider"/> 

	</form>
	
	<!-- faire de not empty pour vérifier qu'il a remplit les champs sauf si required marche bien-->
	<br />
	<a href="Accueil.html">Accueil</a> <br />
	
	</body>
	
	
	</html>