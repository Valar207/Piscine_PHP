<?php
    if (isset($_POST['modify-article-submit']))
    {
        require "../../includes/dbh.inc.php";

        $name = $_POST['name-article'];

        if (empty($name))
        {
            header("Location: ../modifyArticle.php?error=emptyfields");
            exit();
        }
        else
        {
            $sql = "SELECT idArticles, nameArticles, priceArticles FROM articles WHERE nameArticles = '" . mysqli_real_escape_string($conn, $name) . "'";
            $result = mysqli_query($conn, $sql);
            if ($result)
            {
                $row = mysqli_fetch_assoc($result);
                session_start();
                $_SESSION['articleId'] = $row['idArticles'];
                $_SESSION['articleName'] = $row['nameArticles'];
                $_SESSION['articlePrice'] = $row['priceArticles'];
                mysqli_free_result($result);
                header("Location: ../modifyArticle.php?article=exists");
                exit();
            }
            else
            {
                header("Location: ../modifyArticle.php?error=sqlerror");
                exit();
            }
        }
    }
    else if (isset($_POST['save-article-submit']))
    {
        require "../../includes/dbh.inc.php";

        $id = $_POST['id-article'];
        $name = $_POST['name-article'];
        $price = $_POST['price-article'];

        $sql = "UPDATE articles SET nameArticles='" . mysqli_real_escape_string($conn, $name) . "', priceArticles='" . mysqli_real_escape_string($conn, $price) . "' WHERE idArticles='" . mysqli_real_escape_string($conn, $id) . "'";
        $result = mysqli_query($conn, $sql);
        if ($result)
        {
            header("Location: ../admin.php?article=saved");
            exit();
        }
        else
        {
            header("Location: ../modifyArticle.php?error=sqlerror");
            exit();
        }
    }
?>