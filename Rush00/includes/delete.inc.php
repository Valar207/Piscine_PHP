<?php
    if (isset($_POST['delete-submit']))
    {
        session_start();
        require "dbh.inc.php";

        $id = $_SESSION['userId'];
        
        $sql = "DELETE FROM users WHERE idUsers =" . mysqli_real_escape_string($conn, $id);
        if (mysqli_query($conn, $sql))
        {
            session_unset();
            session_destroy();
            header("Location: ../index.php?profile=delete");
            exit();
        }
        else
        {
            header("Location: ../profile.php?error=sqlerror4");
            exit();
        }
    }
    else
    {
        header("Location: ../index.php");
        exit();
    }
?>