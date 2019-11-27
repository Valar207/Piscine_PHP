<?php
    if (isset($_POST['add-article-submit']))
    {
        require "../../includes/dbh.inc.php";

        $name = $_POST['name-article'];
        $price = $_POST['price-article'];

        if (empty($name) || empty($price))
        {
            header("Location: ../addArticle.php?error=emptyfields");
            exit();
        }
        else
        {
            $sql = "SELECT nameArticles FROM articles WHERE nameArticles=?";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql))
            {
                header("Location: ../addArticle.php?error=sqlerror1");
                exit();
            }
            else
            {
                mysqli_stmt_bind_param($stmt, "s", $name);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $resultCheck = mysqli_stmt_num_rows($stmt);
                if ($resultCheck > 0)
                {
                    header("Location: ../addArticle.php?error=nametaken");
                    exit();
                }
                else
                {
                    /* For uploading image */
                    $targetDir = "../img/";
                    $targetFile = $targetDir . basename($_FILES['img-article']['name']);
                    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
                    if ($check = getimagesize($_FILES['img-article']['tmp_name']) !== false)
                    {
                        if (!($_FILES['img-article']['size'] > 500000))
                        {
                            if (!(move_uploaded_file($_FILES['img-article']['tmp_name'], $targetFile)))
                            {
                                header("Location: ../addArticle.php?error=couldnotuploadfile4");
                                exit();
                            }
                        }
                        else
                        {
                            header("Location: ../addArticle.php?error=couldnotuploadfile3");
                            exit();
                        }
                    }
                    else
                    {
                        header("Location: ../addArticle.php?error=couldnotuploadfile1");
                        exit();
                    }
                    
                    $sql = "INSERT INTO articles (nameArticles, priceArticles, imgArticles) VALUES (?, ?, ?)";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sql))
                    {
                        header("Location: ../addArticle.php?error=sqlerror2");
                        exit();
                    }
                    else
                    {
                        mysqli_stmt_bind_param($stmt, "sds", $name, $price, $targetFile);
                        mysqli_stmt_execute($stmt);
                    }
                }
            }
        }

        if (empty($_POST['categories']))
        {
            header("Location: ../addArticle.php?error=emptyfields");
            exit();
        }
        else
        {
            $i = 0;
            foreach ($_POST['categories'] as $idCats)
            {
                $categories[$i] = $idCats;
                $i += 1;
            }
            $sql = "SELECT idArticles FROM articles WHERE nameArticles = '$name'";
            $result = mysqli_query($conn, $sql);
            if (!$result)
            {
                header("Location: ../addArticle.php?error=sqlerror3");
                exit();
            }
            else
            {
                $row = mysqli_fetch_assoc($result);
                foreach ($categories as $idCategories)
                {
                    $sql = "INSERT INTO articlescategories (idArticles, idCategories) VALUES (?, ?)";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sql))
                    {
                        header("Location: ../addArticle.php?error=sqlerror4");
                        exit();
                    }
                    else
                    {
                        mysqli_stmt_bind_param($stmt, "ii", $row['idArticles'], $idCategories);
                        mysqli_stmt_execute($stmt);
                    }
                }
                header("Location: ../admin.php?article=added");
                exit();
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
    else
    {
        header("Location: ../addArticle.php");
        exit();
    }