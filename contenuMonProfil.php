<section>
		<aside>
			<div id="profil">
				<div class="description_profil">
					<img src="" alt="Photo de profil" >
					<h1><?php echo ($_SESSION['prenom'] . ' ' . $_SESSION['nom']); ?><h1>
					<p>Adresse : <?php echo($_SESSION['rue'] . ' ' . $_SESSION['codePostal'] . ' ' . $_SESSION['ville']); ?> <br/>
					Téléphone portable : <?php echo ($_SESSION['telephone']); ?> <br/>
					Date de Naissance : <?php echo ($_SESSION['date']); ?> <br/>
					E-mail : <?php echo ($_SESSION['email']); ?> 
					</p>
					<a href="#C1" class="equiper">Ajouter un utilisateur</a>
					<a href="index.php?cible=monDomicile&dom=ajouteCapteur" class="equiper">Ajouter un capteur</a>
					<a href="index.php?cible=monProfilModifier" class="equiper">Modifier mon profil</a>
				</div>	
			</div>
		</aside>

		
		<div id="informations">
		<h2 id="C1">Ajouter un utilisateur</h2>
			<div id="box2">
				
				<div class="description_informations">					
					<p><?php echo ('Domicile : ' . ' ' . $_SESSION['rue'] . ' ' . $_SESSION['codePostal'] . ' ' . $_SESSION['ville']);?></p>
					<ul>
						<li><?php echo ($_SESSION['prenom'] . ' ' . $_SESSION['nom'] . ' ' . '(' . $_SESSION['email'] . ')'); ?></li>
					</ul>
				</div>
					
				<div class="description_informations">
					<form method="POST" action="">
						<table>

							<tr class="Accueil">
								<td class="Accueil"><input type="text" name="prenom" placeholder="Prenom" /></td>
							</tr>

							<tr class="Accueil">
								<td class="Accueil"><input type="text" name="nom" placeholder="Nom" /></td>
							</tr>

							<tr class="Accueil">
								<td class="Accueil"><input type="email" name="email" placeholder="E-mail" /></td>
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