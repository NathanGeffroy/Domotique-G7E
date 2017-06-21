<aside class="monDomicile">
		<?php echo '<h1>'. $_SESSION['prenom'] . ' ' . $_SESSION['nom'].'</h1>';?>
		<ul>
			<li><a href="index.php?cible=monDomicile&type=general">Tableau de bord</a></li>
			<li><a href="index.php?cible=monDomicile&type=consigne">Gestion</a></li>
			<li><a href="index.php?cible=monDomicile&type=piece">Par pièce</a></li>
			<li><a href="index.php?cible=monDomicile&type=capteur">Par type de capteur</a></li>
			<li><a href="index.php?cible=monDomicile&dom=ajouteCapteur">Ajouter capteur</a></li>
			<li><a href="index.php?cible=monDomicile&dom=supprimeCapteur">Supprimer capteur</a></li>
			<li><a href="index.php?cible=monDomicile&dom=ajoutePiece">Ajouter pièce</a></li>
			<li><a href="index.php?cible=monDomicile&dom=supprimePiece">Supprimer piece</a></li>
		</ul>
</aside>