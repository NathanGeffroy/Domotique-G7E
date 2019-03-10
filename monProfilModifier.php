<?php
	$titre = 'Modifier mon profil';
    if($_SESSION['Administrateur']==1){
		$entete = entete(3);
	}else{
    	$entete = entete(2);
    }
    $contenu = contenu('monProfilModifier');
    $pied = pied();

    include 'gabarit.php';
?>
