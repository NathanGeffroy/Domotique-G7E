
<section id="secDom">

	<?php require('aside.php');?>

	<article class="artDom">
	<div id=divers>
		
		<?php require('fonctionalite.php');?>

	</div>
	
		<div id="domi">
				
		</div>
	</article>
<?php

$ch = curl_init();
curl_setopt(
$ch,
CURLOPT_URL, "http://projets-tomcat.isep.fr:8080/appService?ACTION=GETLOG&TEAM=007E");
curl_setopt($ch, CURLOPT_HEADER, FALSE); curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); $data = curl_exec($ch);
curl_close($ch);
echo "Raw Data:<br />";
echo("$data");

$data_tab = str_split($data,33);
echo "Tabular Data:<br />";
for($i=0, $size=count($data_tab); $i<$size-1; $i++){
	$trame = $data_tab[1];
	list($t, $o, $r, $c, $n, $v, $a, $x, $year, $month, $day, $hour, $min, $sec) = sscanf($trame,"%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");
	$pc=(float)$v/10
	;
	echo("<br />$t,$o,$r,$c,$n,$pc%,$a,$x,$year,$month,$day,$hour,$min,$sec =$v%<br />");
}




if(isset($_GET['type']) && $_GET['type']=='general' or isset($_GET['cible']) && $_GET['cible']=='verif'){
	?>
		<script type="text/javascript">
			var tr = document.createElement('table');
			tr.id="table";
    		document.getElementById('domi').appendChild(tr);
    		AjouteLigne("th",0,Array("","",""),Array("Capteur","Information","Défaillance"));
		</script>

		<?php
		$tr=count($_SESSION['typeCapteur']);
		for ($i = 1; $i <$tr+1 ; $i++) {?>
		<script type="text/javascript">
				var nb=<?php echo $i;?>;
				var ser='<?php echo $_SESSION['typeCapteur'][$i-1];?>';
				AjouteLigne("td",nb,Array(" titreCapteur",""," erreur"),Array(ser,"",""));
		</script>
		<?php
		}


		
}else if(isset($_GET['type']) && $_GET['type']=='consigne'){
		
}else if(isset($_GET['type']) && $_GET['type']=='capteur'){
		$tr=count($_SESSION['typeCapteur']);

		for ($i = 0; $i <$tr ; $i++) {?>
		<script type="text/javascript">
				var ser='<?php echo $_SESSION['typeCapteur'][$i];?>';
				var id=<?php echo $i;?>;
				var nb=id;
				var Principal="capteur";
				var Secondaire="pieces";

				var taille=7;

				monDomicile('capteur',ser,id,nb);

				document.getElementsByClassName('capteur')[nb].onclick=affiche2;

				<?php
				include('/Applications/XAMPP/xamppfiles/htdocs/APP/Modele/BDD.php');

				$reponse=capteur2($bdd,$_SESSION['typeCapteur'][$i]);
				
				if($reponse[0]!=""){
					foreach  ($reponse as $row) {
						?>
						var ter='<?php echo $row;?>';
						affichePiece2(ter,nb);
					<?php
					
				}

				}?>
				


		</script>
		<?php
		}
}else{ 
	$tr=0;
		if(isset($_SESSION['piece'])){		
			$tr=count($_SESSION['piece']);
		}
		$j=0;

		for ($i = 0; $i <$tr ; $i++) {?>
		<script type="text/javascript">
				var ser='<?php echo $_SESSION['piece'][$i];?>';
				var IdPiece='<?php echo $_SESSION['idPiece'][$i];?>';
				var nb=<?php echo $i;?>;
				var Principal="piece";
				var Secondaire="capteurs";
				var taille=6;

				monDomicile('piece',ser,IdPiece,nb);

				document.getElementsByClassName('piece')[nb].onclick=affiche;

				<?php
				include('/Applications/XAMPP/xamppfiles/htdocs/APP/Modele/BDD.php');

				$reponse=capteur($bdd,$_SESSION["idPiece"][$i]);
				
				foreach  ($reponse as $row) {
					$Capteur[$j]=$row['Nom'];
					$id=$row['IdCapteur'];
					$donne="N/A";
					
					$valeurs = donnee($bdd,$id);
					
					foreach  ($valeurs as $rows) {
						$donne=$rows['Donnee'];
					}
					$donne=$pc/10;
					?>
					var str='<?php echo $Capteur[$j];?>';
					var nbr=<?php echo $j;?>;
					var don='<?php echo $donne;?>';
					var IdCapteur=<?php echo $id;?>;

					afficheCapteur(nb,nbr,str,don,IdCapteur,"green");
					<?php
					$j++;
				}?>
		</script>
		<?php
		}
}

if(isset($_GET['dom']) AND $_GET['dom']=='supprimeCapteur'){?>
	<script type="text/javascript">
	var a = document.getElementsByClassName('capteur').length;
	for (var i = 0; i < a; i++) {
		document.getElementsByClassName('capteur')[i].onclick=supprimeCapteur;
	}
	</script>
<?php }

if(isset($_GET['dom']) AND $_GET['dom']=='supprimePiece'){?>
	<script type="text/javascript">
	var a = document.getElementsByClassName('piece').length;
	for (var i = 0; i < a; i++) {
		document.getElementsByClassName('piece')[i].onclick=supprimePiece;
	}
	</script>
<?php }?>

			
</section>