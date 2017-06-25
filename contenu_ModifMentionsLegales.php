<?php
	include('/Applications/XAMPP/xamppfiles/htdocs/APP/Modele/BDD.php');
	$contenu=$bdd->query('SELECT Contenu FROM Site WHERE idSite=3');
	$list = $contenu->fetch();
	
?>
	    <input id="bold" type="button" value="G" style="font-weight:bold;" onclick="commande('bold');"/> 
	    <input id="italic" type="button" value="I" style="font-style:italic;" onclick="commande('italic');"/> 
	    <input id="underline" type="button" value="S" style="text-decoration:underline;" onclick="commande('underline');"/>
	    <select id="titre" onchange="commande('formatblock',this.value);">
			<option value="">Titre</option>
			<option value="<h1>">Titre 1</option>
			<option value="<h2>">Titre 2</option>
			<option value="<h3>">Titre 3</option>
			<option value="<h4>">Titre 4</option>
			<option value="<h5>">Titre 5</option>
			<option value="<p>">Paragraphe</option>
		</select>
	    <select id="police" onchange="commande('FontName',this.value);">
		    <option value="">Police</option>
		    <option value="Arial">Arial</option>
		    <option value="Verdana">Verdana</option>
		    <option value="Courier New">Courier New</option>
		    <option value="Time New Roman">Time New Roman</option>
		    <option value="Comic Sans MS">Comic Sans MS</option>

		</select>

		<select name="cmbtaille" onchange="commande('FontSize',this.value)">
		    <option selected="">Taille</option>
		    <option value="1">1 (petite)</option>
		    <option value="2">2</option>
		    <option value="3">3 (normale)</option>
		    <option value="4">4</option>
		    <option value="5">5</option>
		    <option value="6">6</option>
		    <option value="7">7 (grande)</option>
		</select>

	    <input type="button" value="Lien" onclick="commande('createLink');">

	    <?php 
	    	echo '<div id="editeur" contentEditable onclick="pres()" onkeyup="pres()">'.$list['Contenu'].'</div>';
	    ?>
	    <input type="button" onclick="resultat();" value="Obtenir le HTML" ><br />
		<textarea id="resultat"></textarea>
		<input type="button" onclick="Validation();" value="confirmer la modification" ><br />


	</body>
</html>

<script type="text/javascript">
	var list=['bold','italic','underline',''];
	var list1=['FontName','police','formatblock','titre']

	function pres(arg){
		for(i=0;i<list1.length;i=i+2){
			var test=document.queryCommandValue(list1[i]);
			document.getElementById(list1[i+1]).value=test;
		}
		if(document.queryCommandValue('FontName')=="")
			document.getElementById('police').value="Time New Roman";
		
		document.getElementById("editeur").focus();

		for(i=0;i<list.length;i++)
		    	if(document.queryCommandState(list[i]))
	    			document.getElementById(list[i]).style.background = "grey";
				else
			    	document.getElementById(list[i]).style.background = "white";
		if (document.queryCommandState(list[2]) && arg==true)
	    	document.getElementById(list[2]).style.background = "white";
	}
	
	function commande(nom, argument){
	    if (typeof argument === 'undefined') {argument = '';}
	    if(document.queryCommandState(list[2]) && nom==list[2]){var A=true;}
	    switch(nom){
    		case "createLink":
        		argument = prompt("Quelle est l'adresse du lien ?");
    		break;
		}
		
	    document.execCommand(nom, false, argument);
	    pres(A);
	}

	function resultat(){
	    document.getElementById("resultat").value = document.getElementById("editeur").innerHTML;
	}

</script>