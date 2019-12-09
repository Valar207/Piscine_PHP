<?php
    if (isset($_POST['add-category-submit']))
    {
        require "../../includes/dbh.inc.php";

        $name = $_POST['name-category'];

        if (empty($name))
        {
            header("Location: ../addCategory.php?error=emptyfields");
            exit();
        }
        else
        {
            $sql = "SELECT nameCategories FROM categories WHERE nameCategories=?";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql))
            {
                header("Location: ../addCategory.php?error=sqlerror1");
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
                    header("Location: ../addCategory.php?error=nametaken");
                    exit();
                }
                else
                {
                    $sql = "INSERT INTO categories (nameCategories) VALUES (?)";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sql))
                    {
                        header("Location: ../addCategory.php?error=sqlerror2");
                        exit();
                    }
                    else
                    {
                        mysqli_stmt_bind_param($stmt, "s", $name);
                        mysqli_stmt_execute($stmt);
                        header("Location: ../addCategory.php?category=added");
                        exit();
                    }
                }
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
    else
    {
        header("Location: ../addCategory.php");
        exit();
    }