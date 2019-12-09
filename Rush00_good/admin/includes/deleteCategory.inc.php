<?php
    if (isset($_POST['delete-category-submit']))
    {
        require "../../includes/dbh.inc.php";

        $name = $_POST['name-category'];

        if (!empty($name))
        {
            $sql = "SELECT nameCategories FROM categories WHERE nameCategories = ?";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../admin.php?error=sqlerror");
                exit();
            }
            mysqli_stmt_bind_param($stmt, 's', $name);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $res = mysqli_stmt_num_rows($stmt);
            if ($res == 1)
            {
                $sql = "DELETE FROM categories WHERE nameCategories = '" .  mysqli_real_escape_string($conn, $name) . "'";
                mysqli_query($conn, $sql);
                header("Location: ../deleteCategory.php?category=deleted");
                exit();
            }
            else
            {
                header("Location: ../deleteCategory.php?error=sqlerror");
                exit();
            }
        }
        else
        {
            header("Location: ../deleteCategory.php?error=emptyfields");
            exit();
        }
    }
    else
    {
        header("Location: ../../index.php");
        exit();
    }
?>