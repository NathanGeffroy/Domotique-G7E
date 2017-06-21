
<aside>
	<div id="contenu3">
		<div class="description3"><h1>Gérez vos clients</h1>
			<p>Utilisateurs inscrits dans le serveur Domisep</br></br></p>
			<div id=ajout_utilisateur>
				<table id="utilisateurs">
					<tr class='Accueil'> 
						<td class='Accueil'><p>Nom / Prénom</p></td>
						<td class='Accueil'><p>Adresse</p></td>
						<td class='Accueil'><p>E-mail</p></td>
						<td class='Accueil'><p>Panne</p></td>
					</tr>

					<?php
						require ("Modele/BDD.php"); 
						$liste = ListeUtilisateurs($bdd); 
						$nb = count($liste);

						for ($i=0; $i < $nb ; $i++) {
						echo "<tr class='Accueil'>";
							echo "<td class='Accueil'>" . $liste[$i]['Prenom'] . ' ' . $liste[$i]['Nom'] . "</td>";
							echo "<td class='Accueil'>".$liste[$i]['Rue'].' '.$liste[$i]['CodePostal'].' '.$liste[$i]['Ville']."</td>";
							echo "<td class='Accueil'>".$liste[$i]['AdresseMail']."</td>";
							echo "<td class='Accueil'>Non</td>";
						echo "</tr>";
						}
					?>
				</table>
			</div>
		</div>
	</div>	
</aside>