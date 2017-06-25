<?php
            $reponse = mdp($bdd,$_POST['email']);
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

?>