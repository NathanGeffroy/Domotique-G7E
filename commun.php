<?php

// Génère le code HTML de l'entête
function entete($num){
    if($num==1){
        ob_start();
        include 'header1.php';
        $entete = ob_get_clean();
        return $entete;
    }

    else if($num==2){
        ob_start();
        include 'header2.php';
        $entete = ob_get_clean();
        return $entete;
    }
}
?>

<?php
function contenu($page){
    if($page=='Accueil_connecte'){
        ob_start();
        include 'contenuAccueil.php';
        $contenu = ob_get_clean();
        return $contenu;
    }

    else if($page=='Accueil_non_connecte'){
        ob_start();
        include 'contenu_non_connecte.php'; 
        $contenu = ob_get_clean();
        return $contenu;
    }

    else if($page=='monDomicile'){
        ob_start();
        include 'contenuMonDomicile.php'; 
        $contenu = ob_get_clean();
        return $contenu;
    }

    else if($page=='Contact'){
        ob_start();
        include 'contenuContact.php'; 
        $contenu = ob_get_clean();
        return $contenu;
    }

    else if($page=='monProfil'){
        ob_start();
        include 'contenuMonProfil.php'; 
        $contenu = ob_get_clean();
        return $contenu;
    }
}
?>


<?php
function pied(){
    ob_start();
    include 'footer.php';
    $pied = ob_get_clean();
    return $pied;
}
?>