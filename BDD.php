<?php
    $dbname = "Domotique";
    $host='localhost';
    $user='root';
    $pass='';
  	$salt='domotique';

    $bdd = new PDO("mysql:host=$host;dbname=$dbname", "$user", "$pass");
    $bdd->query("SET NAMES UTF8");
?>