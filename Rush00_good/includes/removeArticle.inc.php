<?php
    if (isset($_POST['remove-submit']))
    {
        session_start();
        require "dbh.inc.php";

        $id = $_POST['id-article'];
        
        unset($_SESSION['articles'][$id]);
        header("Location: ../cart.php");
        exit();
    }
    else
    {
        header("Location: ../cart.php");
        exit();
    }
?>