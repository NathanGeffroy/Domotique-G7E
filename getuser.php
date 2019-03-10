<?php

$q = $_GET["q"];


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Domotique";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}



$req = "DELETE FROM Capteurs WHERE IdCapteur  = '" . $q . "'";;

$res = $conn->query($req);

echo "Capteur supprimé";


mysqli_close($conn);
?>
