<?php
require("Modele/BDD.php");

if(!empty($_POST['nomModifier'])){
	$_SESSION['nom'] = $_POST['nomModifier'];
	modifierProfil($bdd, 'personnes', 'Nom', $_POST['nomModifier']);
}

if(!empty($_POST['prenomModifier'])){
	$_SESSION['prenom'] = $_POST['prenomModifier'];
	modifierProfil($bdd, 'personnes', 'Prenom', $_POST['prenomModifier']);
}

if(!empty($_POST['dateModifier'])){
	$_SESSION['date'] = $_POST['dateModifier'];
	modifierProfil($bdd, 'personnes', 'DateDeNaissance', $_POST['dateModifier']);
}

if(!empty($_POST['passModifier'])){
	$_SESSION['pass'] = $_POST['passModifier'];
	modifierProfil($bdd, 'personnes', 'MotDePasse', $_POST['passModifier']);
}

if(!empty($_POST['emailModifier'])){
	$_SESSION['email'] = $_POST['emailModifier'];
	modifierProfil($bdd, 'personnes', 'AdresseMail', $_POST['emailModifier']);
}

if(!empty($_POST['telephoneModifier'])){
	$_SESSION['telephone'] = $_POST['telephoneModifier'];
	modifierProfil($bdd, 'personnes', 'NumeroDeTelephone', $_POST['telephoneModifier']);
}

if(!empty($_POST['rueModifier'])){
	$_SESSION['rue'] = $_POST['rueModifier'];
	modifierProfil($bdd, 'domiciles', 'Rue', $_POST['rueModifier']);
}

if(!empty($_POST['codePostalModifier'])){
	$_SESSION['codePostal'] = $_POST['codePostalModifier'];
	modifierProfil($bdd, 'domiciles', 'CodePostal', $_POST['codePostalModifier']);
}

if(!empty($_POST['villeModifier'])){
	$_SESSION['ville'] = $_POST['villeModifier'];
	modifierProfil($bdd, 'domiciles', 'Ville', $_POST['villeModifier']);
}

include("Vue/monProfil.php");



?>