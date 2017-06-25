<?php 
    session_start();
    require("Modele/BDD.php");
    require("Vue/commun.php");
   
        if(isset($_GET['cible'])) { // on regarde la page où il veut aller
            if($_GET['cible']=='ModifMentionsLegales'){
                include ("Vue/ModifMentionsLegales.php");
            }else if($_GET['cible']=='ajoutAdmin'){
                include("Modele/utilisateurs.php");
                AjouteAdmin($bdd);
                include("Vue/monProfilAdmin.php");
            }else if($_GET['cible'] == 'mention'){
                include('Vue/MentionLegal.php');
            }else if($_GET['cible'] == 'Accueil_connecte'){
                include("Vue/Accueil_connecte.php");

            } else if ($_GET['cible'] == "monDomicile"){
                include("Modele/utilisateurs.php");
                if(isset($_GET['dom']) AND $_GET['dom']=='ajouterCapteur'){
                    require("Modele/BDD.php");
                    AjouteCapteur($bdd);
                }else if(isset($_GET['dom']) AND $_GET['dom']=='ajouterPiece'){
                    require("Modele/BDD.php");
                    AjoutePiece($bdd);
                }else if (isset($_GET['q'])) {
                    require("Modele/BDD.php");
                    SupprimeCapteur($_GET['q'],$bdd);
                }else if (isset($_GET['r'])) {
                    require("Modele/BDD.php");
                    SupprimePiece($_GET['r'],$bdd);
                }
                include("Vue/monDomicile.php");
            } else if ($_GET['cible'] == "Contact"){
                include("Vue/Contact.php");

            } else if ($_GET['cible'] == "monProfil"){
                include("Modele/utilisateurs.php");
                $reponse = domicile($bdd,$_SESSION['idDomicile']);
            
                include("Vue/monProfil.php");
                
            } else if($_GET['cible'] == "monProfilModifier"){
                include("Modele/utilisateurs.php");
                $reponse = domicile($bdd,$_SESSION['idDomicile']);                          

                if(isset($_GET['mod']) AND $_GET['mod']=='modifier'){
                    include("Controleur/modifierProfil.php");
                }else{
                    include("Vue/monProfilModifier.php");
                }

                

            } else if($_GET['cible']=='Accueil_admin'){
                require ("Modele/utilisateurs.php");

                include ("Vue/Accueil_admin.php");
           
            } else if($_GET['cible']=='monProfilAdmin'){

                include ("Vue/monProfilAdmin.php");
           
            } else if($_GET['cible']=='monDomicileAdmin'){
                include ("Vue/monDomicileAdmin.php");
            }  else if($_GET['cible']=='Aide'){
                include ("Vue/Aide.php");

            } else if ($_GET['cible'] == "deconnexion"){
                // Détruit toutes les variables de session
                $_SESSION = array();
                if (isset($_COOKIE[session_name()])) {
                    setcookie('nom');
                    unset($_COOKIE['nom']);
                    setcookie('prenom');
                    unset($_COOKIE['prenom']);
                    setcookie('email');
                    unset($_COOKIE['email']);
                }
                session_destroy();
                include("Vue/Accueil_non_connecte.php");
            }else {
                include("Controleur/connexion.php");
            }

        } else { // affichage par défaut
            if (isset($_COOKIE['nom'])){
                include("Modele/utilisateurs.php");

                $reponse = mdp($bdd,$_COOKIE['email']);
                $ligne = $reponse->fetch();
                $valeur = domicile($bdd,$ligne['IdPersonne']);
                $ligne2=$valeur->fetch();
                $maison=piece($bdd,$ligne2['IdDomicile']);
                $i=0;
                foreach  ($maison as $row) {
                    $piece[$i]=$row['Nom'];
                    $idPiece[$i]=$row['IdPiece'];
                    $i++;
                }


                include('Modele/initSession.php');
                include("Vue/monDomicile.php");
            }
            include("Vue/Accueil_non_connecte.php");
        }
    
?>