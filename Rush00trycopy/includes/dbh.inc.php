<?php
    $servername = "localhost";
    $dBUsername = "root";
    $dBPassword = "root";
    $dbName = "JEUX";

    $conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dbName);
    
    if (!$conn)
        die("Connection failed: ".mysqli_connect_error());
?>