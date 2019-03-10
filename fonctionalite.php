	<?php if(isset($_GET['dom']) AND $_GET['dom']=='ajoutePiece'){?>
			<form method="POST" action="index.php?cible=monDomicile&dom=ajouterPiece">
				<input type="text" name="nomPiece" placeholder="salon" />
				<input id="Ajouter" type="submit" value="Ajouter" />
			</form>
			<?php
		}else if(isset($_GET['dom']) AND $_GET['dom']=='ajouterPiece'){
			echo 'Pièce ajoutée';
		}else if(isset($_GET['dom']) AND $_GET['dom']=='ajouteCapteur'){?>
			<form method="POST" action="index.php?cible=monDomicile&dom=ajouterCapteur">
				<select name="Pieces">
					<option value="choix">Choix Pièce</option>
					<?php 
					$nb=count($_SESSION['piece']);
					for ($i=0; $i <$nb ; $i++) { 
						echo "<option value=".$_SESSION['idPiece'][$i].">".$_SESSION['piece'][$i]."</option>";
					}?>
				</select>
				<select name="Capteurs">
					<option value="choix">Choix Capteur</option>
					<?php 
					$listCapteur= array("Luminosité","Température","Détecteur de Fumée","Humidité","Capteur de CO2","Capteur de présence");
					for ($i=0; $i <6 ; $i++) { 
						echo "<option value=".$i.">".$listCapteur[$i]."</option>";
					}?>
				</select>
				<input id="Ajouter" type="submit" value="Ajouter" />
			</form>
			<?php
		}else if(isset($_GET['dom']) AND $_GET['dom']=='supprimeCapteur'){
					echo "Cliquer sur le capteur à supprimer";
		}else if(isset($_GET['dom']) AND $_GET['dom']=='supprimePiece'){
			echo "Cliquer sur la piece à supprimer";
	}





	?>