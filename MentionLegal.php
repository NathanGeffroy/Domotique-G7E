<?php
	$titre = 'Contact';
    if(isset($_SESSION['nom']) && $_SESSION['Administrateur']==0){
		$entete = entete(2);
	}else if(isset($_SESSION['nom']) && $_SESSION['Administrateur']==1){
    	$entete = entete(3);
    }else{
    	$entete = entete(1);
    }

    include('/Applications/XAMPP/xamppfiles/htdocs/APP/Modele/BDD.php');
	$contenu=$bdd->query('SELECT Contenu FROM Site WHERE TitrePage="MentionLegal"');
	$list = $contenu->fetch();
    $contenu = $list['Contenu'];
    $pied = pied();

    include 'gabarit.php';
?>
