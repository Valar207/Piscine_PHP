<?php
    if (isset($_POST['delete-category-submit']))
    {
        require "../../includes/dbh.inc.php";

        $name = $_POST['name-category'];

        if (!empty($name))
        {
            $sql = "DELETE FROM categories WHERE nameCategories = '" .  mysqli_real_escape_string($conn, $name) . "'";
            if (mysqli_query($conn, $sql))
            {
                header("Location: ../admin.php?category=deleted");
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