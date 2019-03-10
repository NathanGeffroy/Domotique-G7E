<?php
    require("BDD.php");

    // fonction qui cherche le mot de passe d'un utilisateur avec un identifiant dans la base de données
    function mdp($db,$email){
        $reponse = $db->prepare('SELECT * FROM Personnes WHERE AdresseMail=?');
        $reponse->execute(array($email));
        return $reponse;
    }
    
    function domicile($db,$id){
        $valeur = $db->prepare('SELECT * FROM Domiciles JOIN Proprietes ON Domiciles.IdDomicile=Proprietes.IdDomicile WHERE Proprietes.IdPersonne=?');
        $valeur->execute(array($id));
        return $valeur;
    }

    function piece($db,$id){
        $valeur = $db->query('SELECT * FROM Pieces WHERE IdDomicile="'.$id.'" ORDER BY Nom');
        return $valeur;
    }

    function capteur($db,$id){
        $valeur = $db->query('SELECT * FROM Capteurs WHERE IdPiece="'.$id.'"');
        return $valeur;
    }

    function capteur2($bdd,$type){
        $i=0;
        $Luminosite[0]="";
        foreach ($_SESSION['idPiece'] as $key) {
            $valeur = $bdd->query('SELECT IdPiece FROM Capteurs WHERE (IdPiece="'.$key.'") AND (Type="'.$type.'")');
            $test=$valeur->fetch();
            if (isset($test['IdPiece'])) {
                $valeur = $bdd->query('SELECT Nom FROM Pieces WHERE IdPiece="'.$test['IdPiece'].'"');
                $test=$valeur->fetch();
                $Luminosite[$i]= $test['Nom'];
                $i++;
            }
        }
        return $Luminosite;
    }

    function donnee($db,$id){
        $valeur = $db->query('SELECT * FROM Donnees WHERE IdCapteur="'.$id.'"');
        return $valeur;
    }

    function AjouteCapteur($bdd){
        $listCapteur= array("Luminosité","Température","Détecteur de Fumée","Humidité","Capteur de CO2","Capteur de présence");
        $bdd->exec('INSERT INTO Capteurs(IdPiece,Nom,Type) VALUES("'.$_POST['Pieces'].'","'.$listCapteur[$_POST['Capteurs']].'","'.$listCapteur[$_POST['Capteurs']].'") ');
    }

    function SupprimeCapteur($q,$bdd){
        $req = "DELETE FROM Capteurs WHERE IdCapteur  = '" . $q . "'";
        $bdd->exec($req);
    }

    function AjoutePiece($bdd){
        $reponse = $bdd->query('SELECT IdDomicile FROM Domiciles WHERE (Rue="'.$_SESSION['rue'].'") AND (Ville="'.$_SESSION['ville'].'")');
        $i=0;
        foreach  ($reponse as $row) {
            $IdDomicile[$i]=$row['IdDomicile'];
            $i++;
        }
        $bdd->exec('INSERT INTO  Pieces(Nom,IdDomicile) VALUES("'.$_POST['nomPiece'].'","'.$IdDomicile[0].'") ');
        
        InitPiece($bdd,$IdDomicile[0]);
    }

    function SupprimePiece($p,$bdd){
        $req = "DELETE FROM Pieces WHERE IdPiece  = '" . $p . "'";
        $bdd->exec($req);

        $reponse = $bdd->prepare('SELECT Proprietes.IdDomicile AS IdDomicile FROM Proprietes JOIN Personnes ON Personnes.IdPersonne=Proprietes.IdPersonne WHERE Personnes.Nom=?');
        $reponse->execute(array($_SESSION['nom']));
        $domicile=$reponse->fetch();
        
        InitPiece($bdd,$domicile["IdDomicile"]);

    }

    function InitPiece($bdd,$id){
        $reponse = $bdd->query('SELECT * FROM Pieces WHERE IdDomicile="'.$id.'" ORDER BY Nom');
        $i=0;
        unset($_SESSION['piece']);
        unset($_SESSION['idPiece']);
        foreach  ($reponse as $row) {
            $_SESSION['piece'][$i]=$row['Nom'];
            $_SESSION['idPiece'][$i]=$row['IdPiece'];
            $i++;
        }
    }

    function ListeUtilisateurs($bdd){
        $reponse = $bdd->query('SELECT Nom, Prenom, AdresseMail, NumeroDeTelephone, Rue, CodePostal, Ville, Pays FROM Personnes Join Proprietes ON Personnes.IdPersonne=Proprietes.IdPersonne JOIN Domiciles WHERE (Proprietes.IdDomicile=Domiciles.IdDomicile) AND Personnes.Administrateur=0');
        $liste = $reponse->fetchAll();
        return $liste;
    }

    function modifierProfil($bdd, $table, $colonne, $valeur){
        $valeur = htmlspecialchars($valeur);
        $valeur = '"'.$valeur.'"';

        $requete = 'UPDATE '.$table.' 
            SET '.$colonne.' = '.$valeur.' WHERE IdPersonne = "'.$_SESSION['idPersonne'].'" ';

        $reponse = $bdd->prepare($requete);
        return $reponse->execute();
    }

    function AjouteAdmin($bdd){
        $bdd->exec('UPDATE Personnes SET Administrateur="'.$_POST['choix'].'" WHERE (Nom="'.$_POST['nom'].'") AND (Prenom="'.$_POST['prenom'].'") AND (AdresseMail="'.$_POST['email'].'")');
    }

    function ajouteMention($bdd){
        $bdd->exec('DELETE FROM Site WHERE idSite>0');
        $contenu=str_replace('"',"'",$_POST['mentionleg']);
        $bdd->exec('INSERT INTO Site(TitrePage,contenu) VALUES("MentionLegal","'.$contenu.'")');
    }
    
?>
