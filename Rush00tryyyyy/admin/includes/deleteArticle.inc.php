<?php
    if (isset($_POST['delete-article-submit']))
    {
        require "../../includes/dbh.inc.php";

        $name = $_POST['name-article'];

        if (!empty($name))
        {
            $sql = "DELETE FROM articles WHERE nameArticles ='" .  mysqli_real_escape_string($conn, $name) . "'";
            if (mysqli_query($conn, $sql))
            {
                header("Location: ../admin.php?article=deleted");
                exit();
            }
            else
            {
                header("Location: ../deleteArticle.php?error=sqlerror");
                exit();
            }
        }
        else
        {
            header("Location: ../deleteArticle.php?error=emptyfields");
            exit();
        }
    }
    else
    {
        header("Location: ../../index.php");
        exit();
    }
?>