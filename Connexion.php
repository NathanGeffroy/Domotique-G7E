<?php 

	$bdd = new PDO('mysql:host=localhost;dbname=Domotique;charset=utf8', 'root', '');
	$salt="domotique";

	

	
	if ($_GET['cible']=='deconnexion'){
		session_destroy();
		header ('location: /php/App/Matthieu/Git/Controleur/Domotique.php?cible=deconnecter');


	}else if ($_GET['cible']=='verif'){

		include 'variable.php';

		echo $Identification['AdresseMail'];

		if (crypt($_POST['pass'],$salt)==$Identification['MotDePasse'] AND $_POST['email']==$Identification['AdresseMail']){

			session_start ();
			SessionInit();
			
			header ('location: /php/App/Matthieu/Git/Vue/MonDomicile.php');
		}else {
			header ('location: Domotique.php?cible=echoue');
		}



	}else if ($_GET['cible']=='inscrire' AND $_POST['pass']!=""){

		$bdd->exec('INSERT INTO Personnes(Nom,Prenom,DateDeNaissance,Login,MotDePasse,AdresseMail,NumeroDeTelephone) VALUES("'.$_POST['nom'].'","'.$_POST['prenom'].'","'.$_POST['date'].'","'.$_POST['pseudo'].'","'.crypt($_POST['pass'],$salt).'","'.$_POST['email'].'","'.$_POST['Tel'].'") ');

		$bdd->exec('INSERT INTO Domiciles(Rue,CodePostal,Ville,Pays) VALUES("'.$_POST['adresse'].'","'.$_POST['codePostal'].'","'.$_POST['ville'].'","'.$_POST['pays'].'") ');

		include 'variable.php';

		$bdd->exec('INSERT INTO Proprietes VALUES("'.$IdPersonne['IdPersonne'].'","'.$IdDomicile['IdDomicile'].'","1") ');
		session_start ();
		SessionInit();

		header ('location: /php/App/Matthieu/Git/Vue/MonDomicile.php?cible=inscriptionvalide');




	}else if($_GET['cible']=='ajouteCapteur'){
		$listCapteur= array("Luminosité","Température","Détecteur de Fumée","Humidité","Capteur de CO2","Capteur de présence");

		$bdd->exec('INSERT INTO Capteurs(IdPiece,Nom,Type) VALUES("'.$_POST['Pieces'].'","'.$listCapteur[$_POST['Capteurs']].'","'.$listCapteur[$_POST['Capteurs']].'") ');
		header('location: /php/App/Matthieu/Git/Vue/MonDomicile.php');




	}else if($_GET['cible']=='ajoutePiece'){

		session_start ();
		include 'variable.php';
		
		$bdd->exec('INSERT INTO  Pieces(Nom,IdDomicile) VALUES("'.$_POST['nomPiece'].'","'.$IdDomicile[0].'") ');
		$tr=count($_SESSION['piece']);
		$_SESSION['piece'][$tr]=$_POST['nomPiece'];
		$reponse = $bdd->query('SELECT * FROM Pieces WHERE Nom="'.$_POST['nomPiece'].'"');
		$IdPiece = $reponse->fetch(PDO::FETCH_ASSOC);
		$_SESSION['idPiece'][$tr]=$IdPiece['IdPiece'];

		header ('location: /php/App/Matthieu/Git/Vue/MonDomicile.php?cible=ajouterPiece');



	}else if($_GET['cible']=='inscrire'){
		header ('location: /php/App/Matthieu/Git/Controleur/Domotique.php?cible=inscriptionrate');
	}else{
		header ('location: /php/App/Matthieu/Git/Controleur/Domotique.php?cible=nonConnecter');
	}

	function SessionInit(){
				include 'variable.php';
				$_SESSION['email']=$Identification['AdresseMail'];
				$_SESSION['pass']=$Identification['MotDePasse'];
				$_SESSION['nom']=$Identification['Nom'];
				$_SESSION['prenom']=$Identification['Prenom'];
				$_SESSION['domicile']=$domicile['IdDomicile'];
				$_SESSION['piece']=$piece;
				$_SESSION['idPiece']=$idPiece;
	}
	//$bdd->exec('DELETE FROM Personnes WHERE IdPersonne>0');
	//$bdd->exec('DELETE FROM Domiciles WHERE IdDomicile>0');
	//$bdd->exec('INSERT INTO Donnees(Date,IdCapteur,Donnee) VALUES("2010-04-02 15:28:22",1,"19°C") ');
?>