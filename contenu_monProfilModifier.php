
	<section>
		<aside>
			<div id="profil">
				<div class="description_profil_modifier	">
					<img src="" alt="Photo de profil" >
					<h1><?php echo ($_SESSION['prenom'] . ' ' . $_SESSION['nom']); ?><h1>
					<form method="POST" action="index.php?cible=monProfilModifier&mod=modifier">

						<h1><input type="text" name="prenomModifier" placeholder=<?php echo ($_SESSION['prenom']); ?> /><input type="text" name="nomModifier" placeholder=<?php echo ($_SESSION['nom']); ?> /></h1>

						<label for="rueModifier">Adresse : </label>
						<input type="text" name="rueModifier" placeholder=<?php echo ($_SESSION['rue']); ?> /><input type="text" name="codePostalModifier" placeholder=<?php echo ($_SESSION['codePostal']); ?> /><input type="text" name="villeModifier" placeholder=<?php echo ($_SESSION['ville']); ?> /><br/>

						<label for="telephoneModifier">Téléphone portable :</label>
						<input type="text" name="telephoneModifier" placeholder=<?php echo ($_SESSION['telephone']); ?> /><br/>

						<label for="dateModifier">Date de naissance : </label>
						<input type="date" name="dateModifier" placeholder=<?php echo ($_SESSION['date']); ?> /><br/>

						<label for="emailModifier">E-mail : </label>
						<input type="email" name="emailModifier" placeholder=<?php echo($_SESSION['email']); ?> /> <br/>

						<input type="submit" name="Valider" class="equiper" />
					</form>
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

