<?php session_start(); ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="/php/App/Matthieu/Git/Style/Domotique.css">
		<title>Domisep</title>
    </head>

<body>
	<?php include'/Applications/XAMPP/xamppfiles/htdocs/php/App/Matthieu/Git/Vue/Header1.php';?>

	<section>
		<aside class="box">
			<div id="box_connexion">
				<h1>Se connecter</h1>
				<div class="formulaire_connexion">
				<?php if(isset($_GET['cible']) AND $_GET['cible']=='echoue'){
					echo 'mots de passe ou indentifiant incorrect';
				}else if(isset($_GET['cible']) AND $_GET['cible']=='deconnecter'){
					echo 'Deconnection validée';
				}
				?>
					<br/>
					<form method="POST" action="Connexion.php?cible=verif">
						<p>
							<label for="email">E-mail :</label>
							<input type="email" name="email" id="email" />

							<br />
							<br />
							<label for="pass">Mot de passe :</label>
							<input type="password" name="pass" id="pass" />

							<br />
							<br />
							<input type="submit" value="Se connecter" />
						</p>
					</form>
				</div>
			</div>

			<div id="box_connexion">
				<h1>S'inscrire</h1>
				<div class="formulaire_connexion">
					<br/>
					<form method="POST" action="Connexion.php?cible=inscrire">
						<p>	
							<label for="nom">Nom : </label><input type="text" name="nom">

							<br/>
							<br/>
							<label for="prenom">Prénom : </label><input type="text" name="prenom">

							<br/>
							<br/>
							<label for="Adresse">Adresse : </label><input type="text" name="adresse" id="rue" placeholder="Rue" />
							<input type="text" name="ville" placeholder="ville" />
							<input type="text" name="codePostal" placeholder="Code postal" />

							<br/>
							<br/>
							<label for="date_de_naissance">Date de naissance : </label><input type="date" name="date" />

							<br/>
							<br/>
							<label for="email">E-mail : </label><input type="email" name="email" id="email" />

							<br/>
							<br/>
							<label for="pass">Mot de passe : </label><input type="password" name="pass" id="pass" />

							<br/>
							<br/>
							<input type="submit" value="S'inscrire" />
						</p>
					</form>
				</div>
			</div>
		</aside>
	</section>

	<?php include '/Applications/XAMPP/xamppfiles/htdocs/php/App/Matthieu/Git/Vue/Footer.php' ?>

</body>

</html>
