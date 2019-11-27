<?php
    if (isset($_POST['modify-category-submit']))
    {
        require "../../includes/dbh.inc.php";

        $name = $_POST['name-category'];

        if (empty($name))
        {
            header("Location: ../modifyCategory.php?error=emptyfields");
            exit();
        }
        else
        {
            $sql = "SELECT idCategories, nameCategories FROM categories WHERE nameCategories = '" . mysqli_real_escape_string($conn, $name) . "'";
            $result = mysqli_query($conn, $sql);
            if ($result)
            {
                $row = mysqli_fetch_assoc($result);
                session_start();
                $_SESSION['categoryId'] = $row['idCategories'];
                $_SESSION['categoryName'] = $row['nameCategories'];
                mysqli_free_result($result);
                header("Location: ../modifyCategory.php?category=exists");
                exit();
            }
            else
            {
                header("Location: ../modifyCategory.php?error=sqlerror");
                exit();
            }
        }
    }
    else if (isset($_POST['save-category-submit']))
    {
        require "../../includes/dbh.inc.php";

        $id = $_POST['id-category'];
        $name = $_POST['name-category'];

        $sql = "UPDATE categories SET nameCategories='" . mysqli_real_escape_string($conn, $name) . "' WHERE idCategories='" . mysqli_real_escape_string($conn, $id) . "'";
        $result = mysqli_query($conn, $sql);
        if ($result)
        {
            header("Location: ../admin.php?category=saved");
            exit();
        }
        else
        {
            header("Location: ../modifyCategory.php?error=sqlerror");
            exit();
        }
    }
?>