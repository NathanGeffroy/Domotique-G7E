<?php
    // Controleur pour gérer le formulaire de connexion des utilisateurs
    if(isset($_GET['cible']) && $_GET['cible']=="verif") { // L'utilisateur vient de valider le formulaire de connexion
        if(!empty($_POST['email']) && !empty($_POST['pass'])){ // L'utilisateur a rempli tous les champs du formulaire
            include("Modele/utilisateurs.php");     
            include('Modele/BDDSession.php');
            if($reponse->rowcount()>0){
                $crypt=mdpVerif($_POST['pass'],$ligne['MotDePasse']); // Utilisateur trouvé 
                if($crypt){ // Le mot de passe est bon
                    include('Modele/initSession.php');
                    if($ligne['Administrateur']==0){
                        if(isset($_POST['souvenir'])){
                            setcookie('nom', $_SESSION['nom'], time() + 365*24*3600, null, null, false, true);
                            setcookie('prenom', $_SESSION['prenom'], time() + 365*24*3600, null, null, false, true);
                            setcookie('email', $_SESSION['email'], time() + 365*24*3600, null, null, false, true);
                        }
                        include("Vue/monDomicile.php");
                    }else{
                        include ("Vue/Accueil_admin.php");
                    }
                    

                    
                }else{// Le mot de passe entré ne correspond pas à celui stocké dans la base de données
                    include("Vue/Accueil_non_connecte.php");
                }
            }else{// L'utilisateur n'a pas été trouvé dans la base de données
                include("Vue/Accueil_non_connecte.php");
            }
        } else { // L'utilisateur n'a pas rempli tous les champs du formulaire
            include("Vue/Accueil_non_connecte.php");
        }
    

    } else if(isset($_GET['cible']) && $_GET['cible']=='inscrire'){

        $crypt=mdpcript($_POST['pass']);
        if(!empty($_POST['email']) && !empty($_POST['pass'])){

            $reponse = $bdd->query('SELECT IdPersonne FROM Personnes WHERE (Nom="'.$_POST["nom"].'") AND (Prenom="'.$_POST["prenom"].'") AND (DateDeNaissance="'.$_POST["date"].'")');
            $IdPersonne = $reponse->fetch(PDO::FETCH_ASSOC);

            if(isset($IdPersonne['IdPersonne'])==false){
                $bdd->exec('INSERT INTO Personnes(Nom,Prenom,DateDeNaissance,MotDePasse,AdresseMail,NumeroDeTelephone) VALUES("'.$_POST['nom'].'","'.$_POST['prenom'].'","'.$_POST['date'].'","'.$crypt.'","'.$_POST['email'].'","'.$_POST['telephone'].'") ');

                $reponse = $bdd->query('SELECT IdDomicile FROM Domiciles WHERE (Rue="'.$_POST["rue"].'") AND (Ville="'.$_POST["ville"].'")');
                $IdDomicile = $reponse->fetch(PDO::FETCH_ASSOC);

                if(isset($IdDomicile['IdDomicile'])==false){
                    $bdd->exec('INSERT INTO Domiciles(Rue,CodePostal,Ville,Pays) VALUES("'.$_POST['rue'].'","'.$_POST['codePostal'].'","'.$_POST['ville'].'","'.$_POST['pays'].'") ');

                    $reponse = $bdd->query('SELECT IdDomicile FROM Domiciles WHERE (Rue="'.$_POST["rue"].'") AND (Ville="'.$_POST["ville"].'")');
                    $IdDomicile = $reponse->fetch(PDO::FETCH_ASSOC);
                }

                $reponse = $bdd->query('SELECT IdPersonne FROM Personnes WHERE (Nom="'.$_POST["nom"].'") AND (Prenom="'.$_POST["prenom"].'")');
                $IdPersonne = $reponse->fetch(PDO::FETCH_ASSOC);

                $bdd->exec('INSERT INTO Proprietes VALUES("'.$IdPersonne['IdPersonne'].'","'.$IdDomicile['IdDomicile'].'","1") ');
                include("Modele/utilisateurs.php");     
                include('Modele/BDDSession.php');
                include('Modele/initSession.php');
                if(isset($_POST['souvenir'])){
                    setcookie('nom', $_SESSION['nom'], time() + 365*24*3600, null, null, false, true);
                    setcookie('prenom', $_SESSION['prenom'], time() + 365*24*3600, null, null, false, true);
                    setcookie('email', $_SESSION['email'], time() + 365*24*3600, null, null, false, true);
                }
                include 'Vue/Accueil_connecte.php';
            }else{
                echo "compte existant à ce nom";
                include 'Vue/Accueil_non_connecte.php';
            }
        }
    } else { // La page de connexion par défaut
        include("Vue/Accueil_non_connecte.php");
    }

    function mdpCript($mdp){
        $cost=getOptimalCost(0.4);
        $hash = password_hash($mdp,PASSWORD_BCRYPT,['cost' => $cost]);
        return $hash;
    }

    function mdpVerif($mdp,$base){
        if(password_verify($_POST['pass'],$base)) {
            $result=true;
        }else{
            $result=false;
        }
        return $result;
    }


    function getOptimalCost($timeTarget){ 
    $cost = 9;
    do {
        $cost++;
        $start = microtime(true);
        password_hash("test", PASSWORD_BCRYPT, ["cost" => $cost]);
        $end = microtime(true);
    } while (($end - $start) < $timeTarget);
    return $cost;
}
?>