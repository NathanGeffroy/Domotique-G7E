


		
function monDomicile(type,str,idPiece,nb){
	if(type=='piece'){
		affichePiece(str,idPiece,nb,type,"capteurs");
	}else{
		affichePiece(str,idPiece,nb,type,"pieces");
	}
}

function supprimeCapteur(){
	var test = confirm("Confirmer la suppression");
	if(test){
		showUser(this.id,"Capteur");
	}
	
}

function supprimePiece(){
	var test = confirm("Confirmer la suppression");
	if(test){
		showUser(this.id.substring(6),"Piece");
	}
}

function AjouteLigne(type,nb,ext,col){
	var tr = document.createElement('tr');
	tr.id="ligne"+nb;
	document.getElementById('table').appendChild(tr);
	for (var i = 0; i < 3; i++) {
		var tr = document.createElement(type);
		tr.className="colonne"+nb+" "+ext[i];
		document.getElementById('ligne'+nb).appendChild(tr);
		document.getElementsByClassName('colonne'+nb)[i].innerHTML =col[i];
	}
}

function affiche(){
	var nb=this.className.substring(taille);
	var test=document.getElementsByClassName(Secondaire);
	var test2=test.length;
	for(var i=0;i<test2;i++){
		if(i==nb & test[i].style.display=='none'){
			document.getElementsByClassName(Secondaire)[i].style.display='flex';
			document.getElementsByClassName('titre')[i].style.color='#8BFFE8';
		}else{
			document.getElementsByClassName(Secondaire)[i].style.display='none';
			document.getElementsByClassName('titre')[i].style.color='#76D7C4';
		}
		var hauteur =test[i].offsetHeight;
		document.getElementsByClassName(Principal)[i].style.marginBottom = hauteur+"px";
	}
	
}

function affiche2(){
	var nb=this.className.substring(taille);
	var test=document.getElementsByClassName(Secondaire);
	var test2=test.length;
	for(var i=0;i<test2;i++){
		if(i==nb & test[i].style.display=='none'){
			document.getElementsByClassName(Secondaire)[i].style.display='flex';
			document.getElementsByClassName('titre')[i].style.color='#8BFFE8';
		}else{
			document.getElementsByClassName(Secondaire)[i].style.display='none';
			document.getElementsByClassName('titre')[i].style.color='#76D7C4';
		}
		var hauteur =test[i].offsetHeight;
		document.getElementsByClassName(Principal)[i].style.marginBottom = hauteur+"px";
	}
}

function showUser(str,type){
    if (str == ""){
        document.getElementById("divers").innerHTML = "";
        return;
    }
    if (window.XMLHttpRequest) {
        xmlhttp= new XMLHttpRequest();
    } else {
        if (window.ActiveXObject)
            try {
                xmlhttp= new ActiveXObject("Msxml2.XMLHTTP");
            } catch (e) {
                try {
                    xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
                } catch (e) {
                    return NULL;
                }
            }
    }

    xmlhttp.onreadystatechange = function (){
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
            window.location.reload();
        }
    }
    if(type=="Capteur"){
    	xmlhttp.open("GET", "index.php?cible=monDomicile&q=" + str, true);
	} else if (type=="Piece"){
		xmlhttp.open("GET", "index.php?cible=monDomicile&r=" + str, true);
	}
    xmlhttp.send();
}

function affichePiece(piece,id,nb,type,child){
		nouveauDiv = document.createElement("div");
		nouveauDiv.className=type+' '+nb;
		nouveauDiv.id=type+' '+id;
		p = document.getElementById("domi");
		p.appendChild(nouveauDiv);
		document.getElementById(type+' '+id).innerHTML += "<h2 class='titre'>"+piece+"</h2>";
		
		nouveauDiv = document.createElement("div");
		nouveauDiv.className=child;
		nouveauDiv.style.display="none";
		p = document.getElementById(type+' '+id);
		p.appendChild(nouveauDiv); 
		
}

function affichePiece2(str,nbr){
	document.getElementsByClassName("pieces")[nbr].innerHTML += "<h3>"+str+"</h3>";

}

function afficheCapteur(nb,nbr,str,don,IdCapteur,color){
	if (str=='Luminosité') {
		var typeCapteur="luminosite";
		if(don=="?"){
			var valeur="<span class='description_capteur'>"+don+"</span>";
		}else{
			var valeur='<form><input type="range" value="'+don+'" class="range"></form>';
		}	
	}else if(str=='Température'){
		var typeCapteur="temperature";
		var valeur="<span class='description_capteur'>"+don+"</span>";
	}else if(str=='Détecteur de Fumée'){
		var typeCapteur="detecteurfumee";
		var valeur="<span class='description_capteur'>"+don+"</span>";
	}else if(str=='Humidité'){
		var typeCapteur="humidite";
		var valeur="<span class='description_capteur'>"+don+"</span>";
	}else if(str=='Capteur de CO2'){
		var typeCapteur="capteurco2";
		var valeur="<span class='description_capteur'>"+don+"</span>";
	}else if(str=='Capteur de présence'){
		var typeCapteur="capteurpresence";
		var valeur="<span class='description_capteur'>"+don+"</span>";
	}
	nouveauDiv = document.createElement("div");
	nouveauDiv.className='capteur';
	nouveauDiv.id=IdCapteur;
	p = document.getElementsByClassName("capteurs")[nb];
	p.appendChild(nouveauDiv);  

	nouveauDiv = document.createElement("div");
	nouveauDiv.className='title';
	p = document.getElementsByClassName("capteur")[nbr];
	p.appendChild(nouveauDiv);  

	var monImg = document.createElement('img');
	monImg.className=typeCapteur;
	monImg.alt=typeCapteur;
	monImg.src = "Image/"+typeCapteur+".png";
	
	div = document.createElement("div");
	div.className="Etat";
	div.style.backgroundColor = color;
	p = document.getElementsByClassName('title')[nbr];
	p.appendChild(div);  

	document.getElementsByClassName("title")[nbr].innerHTML += "<h3>"+str+"</h3>";
	document.getElementsByClassName("capteur")[nbr].appendChild(monImg);
	document.getElementsByClassName("capteur")[nbr].innerHTML += valeur;
}


