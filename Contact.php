<?php
	$titre = 'Contact';
    if(isset($_SESSION['nom'])){
		$entete = entete(2);
	}else{
    	$entete = entete(1);
    }
    $contenu = contenu('Contact');
    $pied = pied();

    include 'gabarit.php';
?>
