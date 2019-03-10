<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="/php/App/Matthieu/Git/Style/Domotique.css">
		<title>Domisep</title>
    </head>

<body>
<?php
	include'Header2.php';
	if ($_SESSION['prenom']!='' AND $_SESSION['nom']!='')
	{
		echo htmlspecialchars("Bonjour " . ' ' . $_SESSION['prenom'] . ' ' . $_SESSION['nom']);
	}
	else
	{
		echo "Veuillez entrer tous les paramètres nécessaires.";
	}
?>

	<section>
		<div id="domicile">
				<h2>Salon</h2>
				<div id="piece">
							<div id="capteur">
									<h3>Température</h3>
									<img src="/php/App/Matthieu/Git/Image/temperature.png" alt="Température" class="temperature">
									<span class="description_capteur">30°C</span>				
							</div>

							<div id="capteur">
									<h3>Luminosité</h3>
									<img src="/php/App/Matthieu/Git/Image/luminosite.png" alt="Luminosité" class="luminosite">
									<form>
										<input type="range" class="range">
									</form>	
							</div>

							<div id="capteur">
									<h3>Humidité</h3>
									<img src="/php/App/Matthieu/Git/Image/humidite.png" alt="Humidité" class="humidite">
									<span class="description_capteur">20%</span>
							</div>

							<div id="capteur">
									<h3>Température</h3>
									<img src="/php/App/Matthieu/Git/Image/temperature.png" alt="Température" class="temperature">
									<span class="description_capteur">30°C</span>				
							</div>

							<div id="capteur">
									<h3>Luminosité</h3>
									<img src="/php/App/Matthieu/Git/Image/luminosite.png" alt="Luminosité" class="luminosite">
									<form>
										<input type="range" class="range">
									</form>		
							</div>

							<div id="capteur">
									<h3>Humidité</h3>
									<img src="/php/App/Matthieu/Git/Image/humidite.png" alt="Humidité" class="humidite">
									<span class="description_capteur">20%</span>
							</div>			
				</div>

				<h2>Salle à manger</h2>
				<div id="piece">
					<div id="capteur">
							<h3>Température</h3>
							<img src="/php/App/Matthieu/Git/Image/temperature.png" alt="Température" class="temperature">
							<span class="description_capteur">30°C</span>								
					</div>

					<div id="capteur">
							<h3>Luminosité</h3>
							<img src="/php/App/Matthieu/Git/Image/luminosite.png" alt="Luminosité" class="luminosite">
							<form>
								<input type="range" class="range">
							</form>			
					</div>

					<div id="capteur">
							<h3>Humidité</h3>
							<img src="/php/App/Matthieu/Git/Image/humidite.png" alt="Humidité" class="humidite">
							<span class="description_capteur">20%</span>	
					</div>							
				</div>
		</div>
			




			<!--<div id="piece">
				<div id="capteur">
					<div class="description_capteur">
						<h3>Luminosité</h3>	
					</div>
				</div>
				<div id="capteur">
					<div class="description_capteur">
						<h3>Température</h3>	
					</div>				
				</div>
				<div id="capteur">
					<div class="description_capteur">
						<h3>Humidité</h3>	
					</div>				
				</div>
			</div>-->
	</section>

	<?php include 'Footer.php' ?>
</body>

</html>
