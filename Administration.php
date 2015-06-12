<?php
	
	function administration(){
		echo'<form action="NouveauProduit.php" method="post">';
		echo'<input type="submit" value="Nouveau Produit" />';
		echo'</form>';
		
		echo'<form action="NouvelleEspece.php" method="post">';
		echo'<input type="submit" value="Nouvelle Espèce" />';
		echo'</form>';
		
		echo'<form action="NouvelleOrigine.php" method="post">';
		echo'<input type="submit" value="Nouvelle Origine" />';
		echo'</form>';
	}
?>