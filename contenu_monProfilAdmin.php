
<section>
	<aside>
		<div id="profil">
			<div class="description_profil">
				<img src="" alt="Photo de profil" >
				<h1>Administrateur <?php echo ($_SESSION['prenom'] . ' ' . $_SESSION['nom']); ?><h1>
				<a href="index.php?cible=Accueil_admin" class="equiper">Gérer les clients</a>
				<a href="index.php?cible=monDomicile" class="equiper">Demandes d'installation</a>
				<a href="index.php?cible=monProfilModifier" class="equiper">Modifier mon profil</a>
			</div>	
		</div>
	</aside>

	
	<div id="informations">
	<h2 id="C1">Ajouter un administrateur</h2>
		<div id="box2">
			
			<div class="description_informations">					
				<p><?php echo ('Domicile : ' . ' ' . $_SESSION['rue'] . ' ' . $_SESSION['codePostal'] . ' ' . $_SESSION['ville']);?></p>
				<ul>
					<li><?php echo ($_SESSION['prenom'] . ' ' . $_SESSION['nom'] . ' ' . '(' . $_SESSION['email'] . ')'); ?></li>
				</ul>
			</div>
				
			<div class="description_informations">
				<form method="POST" action="index.php?cible=ajoutAdmin">
					<table>

						<tr class="Accueil">
							<td class="Accueil"><input type="text" name="prenom" placeholder="Prenom" class="ajout" /></td>
						</tr>

						<tr class="Accueil">
							<td class="Accueil"><input type="text" name="nom" placeholder="Nom" class="ajout" /></td>
						</tr>

						<tr class="Accueil">
							<td class="Accueil"><input type="email" name="email" placeholder="E-mail"  class="ajout" /></td>
						</tr>

						<tr class="Accueil">
							<td class="Accueil">
								<select>
									<option>Client</option>
									<option>Administrateur</option>	
								</select>
							</td>
						</tr>

						<tr class="Accueil">
							<td class="Accueil"><input type="submit" name="Ajouter" id="Ajouter" /></td>
						</tr>
					</table>
				</form>
			</div>
		</div>	
	</div>
</section>

