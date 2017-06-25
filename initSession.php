<?php
            $_SESSION['idPersonne'] = $ligne['IdPersonne'];
            $_SESSION["nom"] = $ligne['Nom'];
            $_SESSION["prenom"] = $ligne['Prenom'];
            $_SESSION['email']=$ligne['AdresseMail'];
            $_SESSION['pass']=$ligne['MotDePasse'];
            $_SESSION['telephone']=$ligne['NumeroDeTelephone'];
            $_SESSION['date']=$ligne['DateDeNaissance'];
            $_SESSION['Administrateur']=$ligne['Administrateur'];

            $_SESSION['rue'] = $ligne2['Rue'];
            $_SESSION['codePostal'] = $ligne2['CodePostal'];
            $_SESSION['ville'] = $ligne2['Ville'];
            $_SESSION['pays'] = $ligne2['Pays'];
            $_SESSION['idDomicile']=$ligne2['IdDomicile'];

            $_SESSION['typeCapteur']=array("Luminosité","Température","Détecteur de Fumée","Humidité","Capteur de CO2","Capteur de présence");

            if(isset($piece)){
                  $_SESSION['piece'] = $piece;
                  $_SESSION['idPiece'] = $idPiece;
            }

           
?>