<?php
    require "dbh.inc.php";

    if (isset($_POST['buy-submit']))
    {
        session_start();
        $idUsers = $_POST['idUser'];
        $articles = $_SESSION['articles'];

        foreach ($articles as $idarticle => $quantity)
        {
            $sql = "INSERT INTO orders (idUsers, idArticles, quantityArticles) VALUES (?, ?, ?)";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql))
            {
                header("Location: ../cart.php?error=sqlerror2");
                exit();
            }
            else
            {
                mysqli_stmt_bind_param($stmt, "iii", $idUsers, $idarticle, $quantity);
                mysqli_stmt_execute($stmt);
            }
        }
        unset($_SESSION['articles']);
        header("Location: ../cart.php?order=success");
        exit();
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
    else
    {
        header("Location: ../cart.php");
        exit();
    }
?>