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
            $sql = "SELECT idArticles, nameArticles, priceArticles FROM articles WHERE nameArticles = ?";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../admin.php?error=sqlerror");
                exit();
            }
            mysqli_stmt_bind_param($stmt, 's', $name);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $res = mysqli_stmt_num_rows($stmt);
            if ($res >= 1)
            {

                $sql = "SELECT idArticles, nameArticles, priceArticles FROM articles WHERE nameArticles = ?";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)){
                    header("Location: ../admin.php?error=sqlerror");
                    exit();
                }
                mysqli_stmt_bind_param($stmt, 's', $name);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                $row = mysqli_fetch_assoc($result);
                session_start();
                $_SESSION['articleId'] = $row['idArticles'];
                $_SESSION['articleName'] = $row['nameArticles'];
                $_SESSION['articlePrice'] = $row['priceArticles'];
                mysqli_free_result($res);
                header("Location: ../modifyArticle.php?article=exists");
                exit();
            }
            else
            {
                header("Location: ../modifyArticle.php?error=noexist");
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

        $sql = "SELECT idArticles FROM articles WHERE nameArticles = ?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../admin.php?error=sqlerror");
            exit();
        }
        mysqli_stmt_bind_param($stmt, 's', $name);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
        $sql = "UPDATE articles SET nameArticles='" . mysqli_real_escape_string($conn, $name) . "', priceArticles='" . mysqli_real_escape_string($conn, $price) . "' WHERE idArticles='" . mysqli_real_escape_string($conn, $id) . "'";
        $result = mysqli_query($conn, $sql);
        if ($result)
        {
            header("Location: ../modifyArticle.php?success=saved&article=exists");
            exit();
        }
        else
        {
            header("Location: ../modifyArticle.php?error=sqlerror");
            exit();
        }
    }
?>