<section>
	<div id="box_contact">
		<div id="formulaire_contact">
		<h1>Contact</h1>
			<form method="POST" action="Controleur/mail.php">
				<table>
					<tr class="Accueil">
						<td class="Accueil"><label for="nom">Nom :</label></td>
						<td class="Accueil"><input type="text" name="nom" id="contact" /></td>
					</tr>

					<tr class="Accueil">
						<td class="Accueil"><br/></td>
					</tr>

					<tr class="Accueil">
						<td class="Accueil"><label for="email">E-mail :</label></td>
						<td class="Accueil"><input type="email" name="email" id="contact" /></td>
					</tr>

					<tr class="Accueil">
						<td class="Accueil"><br/></td>
					</tr>

					<tr class="Accueil">
						<td class="Accueil"><label for="objet">Objet :</label></td>
						<td class="Accueil"><input type="text" name="objet" id="contact"/></td>
					</tr>

					<tr class="Accueil">
						<td class="Accueil"><br/></td>
					</tr>

					<tr class="Accueil">
						<td class="Accueil"><label for="message">Message :</label></td>
						<td class="Accueil"><textarea name="message" id="contact"></textarea></td>
					</tr>

					<tr class="Accueil">
						<td class="Accueil"><br/></td>
					</tr>

					<tr class="Accueil">
						<td class="Accueil" colspan="2"><input type="submit" value="Envoyer" id="contact"/></td>
					</tr>
				</table>
			</form>
		</div>	
	</div>
</section>

