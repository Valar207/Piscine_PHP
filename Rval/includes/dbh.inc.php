<?php
$servername = "localhost";
$dbUsername = "root";
$dbPwd = "root";
$dbName = "test";

$conn = mysqli_connect($servername, $dbUsername, $dbPwd, $dbName);

if (!$conn)
    die("Erreur : Impossible de se connecter à MySQL".mysqli_connect_error());

?>