
<body>
	<section>
		<aside class="box">
			<div id="box_connexion">
				<h1>Se connecter</h1>
				<div class="formulaire_connexion">
					<br/>
					<form method="POST" action="index.php?cible=verif">
						<table>
						    <tr class="Accueil">
						       <td class="Accueil"><label for="email">E-mail :</label></td>
						       <td class="Accueil"><input type="email" name="email" /></td>
						    </tr>
						    <tr class="Accueil">
						       <td class="Accueil"><label for="pass">Mot de passe :</label></td>
						       <td class="Accueil"><input type="password" name="pass" /></td>
						    </tr>
						    <tr class="Accueil">
						    	<td class="Accueil" colspan="2"><label for="souvenir"><input type="checkbox" name="souvenir" /> Se souvenir de moi</label></td>
						    </tr>
						    <tr class="Accueil">
						       <td  class="Accueil" colspan="2"><input type="submit" value="Se connecter" /></td>
						    </tr>
						</table>
					</form>
				</div>
			</div>

			<div id="box_connexion">
				<h1>S'inscrire</h1>
				<div class="formulaire_connexion">
					<br/>
					<form method="POST" action="index.php?cible=inscrire">
						<table>
						    <tr class="Accueil">
						        <td class="Accueil"><label for="nom" id="label">Nom : </label></td>
						        <td class="Accueil"><input type="text" name="nom" ></td>
						    </tr>
						    <tr class="Accueil">
						        <td class="Accueil"><label for="prenom">Prénom : </label></td>
						        <td class="Accueil"><input type="text" name="prenom" ></td>
						    </tr>
						    <tr class="Accueil">
						        <td class="Accueil"><label for="email">E-mail : </label></td>
						        <td class="Accueil"><input type="email" name="email" /></td>
						    </tr>
						    <tr class="Accueil">
						   	    <td class="Accueil"><label for="rue">Adresse : </label></td>
						        <td class="Accueil"><input type="text" name="rue" placeholder="Rue" /></td>
						    </tr>
						    <tr class="Accueil">
						        <td class="Accueil"></td>
						        <td class="Accueil"><input type=text required name="codePostal" placeholder="Code postal" /><input type="text" name="ville" placeholder="ville" /></td>
						    </tr>
						    <tr class="Accueil">
						    	<td class="Accueil"></td>
						        <td class="Accueil"><input type="text" name="pays" value="France" /></td>
						    </tr>
						    <tr>
						        <td class="Accueil"><label for="date">Date de naissance : </label></td>
						        <td class="Accueil"><input type="date" name="date" placeholder="1995/07/26" /></td>
						    </tr>
						    <tr class="Accueil">
						        <td class="Accueil"><label for="telephone" id="label">Numéro de Télephone : </label></td>
						        <td class="Accueil"><input type="text" name="telephone" id="Tel" placeholder="06000000" /></td>
						    </tr>
						    <tr class="Accueil">
						        <td class="Accueil"><label for="pass" id="label">Mot de passe : </label></td>
						        <td class="Accueil"><input type="password" name="pass" id="pass" /></td>
						    </tr>
						    <tr class="Accueil">
						        <td class="Accueil"><label for="pass" id="label">Confirmer le mot de passe : </label></td>
						        <td class="Accueil"><input type="password" name="pass" id="pass" /></td>
						    </tr>

						    <tr class="Accueil">
								<td class="Accueil"><br/></td>
							</tr>
							<tr class="Accueil">
						    	<td class="Accueil" colspan="2"><label for="souvenir"><input type="checkbox" name="souvenir" /> Se souvenir de moi</label></td>
						    </tr>
							<tr class="Accueil">
								<td class="Accueil" colspan="2"><input type="checkbox" name="conditions" required><label for="conditions"> J'accepte les <a href="#">conditions générales d'utilisations</a> de Domisep</label></td>
							</tr>


							<tr class="Accueil">
								<td class="Accueil"><br/></td>
							</tr>

						    <tr class="Accueil">
						       <td class="Accueil" colspan="2"><input type="submit" value="S'inscrire" /></td>
						   </tr>
						</table>
					</form>
				</div>
			</div>
		</aside>
	</section>
</body>