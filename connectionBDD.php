<?php
	
	include ("formulaire_entree.php"); 

	$utilisateur=$_POST['utilisateur'];
	$pass=$_POST['pass'];

	try{
	$bdd = new PDO('mysql:host=88.175.12.41;dbname=BaseGrandParc',$utilisateur,$pass,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch (Exception $e)
	{	
        die('Saisie invalide');    
	}
	 
	header('Location: Accueil.html');
 exit();
	
