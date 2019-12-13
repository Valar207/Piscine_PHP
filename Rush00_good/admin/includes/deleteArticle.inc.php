<?php
    if (isset($_POST['delete-article-submit']))
    {
        require "../../includes/dbh.inc.php";

        $name = $_POST['name-article'];

        $name = trim($name);        
        if (!empty($name))
        {
            $sql = "SELECT nameArticles FROM articles WHERE nameArticles=?";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../admin.php?error=sqlerror");
                exit();
            }
            mysqli_stmt_bind_param($stmt, 's', $name);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $res = mysqli_stmt_num_rows($stmt);
            if ($res == 1){
                $sql = "DELETE FROM articles WHERE nameArticles ='" .  mysqli_real_escape_string($conn, $name) . "'";
                mysqli_query($conn, $sql);
                header("Location: ../deleteArticle.php?article=deleted");
                exit();
            }
            if ($res == 0){
                header("Location: ../deleteArticle.php?error=noexist");
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