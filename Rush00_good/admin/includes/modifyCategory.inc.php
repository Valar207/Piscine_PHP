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
            $sql = "SELECT idCategories, nameCategories FROM categories WHERE nameCategories = ?";
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
                $sql = "SELECT idCategories, nameCategories FROM categories WHERE nameCategories = ?";
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

        if(empty($name))
        {
            header("Location: ../modifyCategory.php?category=empty");
            exit();
        }
        $sql = "SELECT idCategories FROM categories WHERE nameCategories = ?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../admin.php?error=sqlerror");
            exit();
        }
        mysqli_stmt_bind_param($stmt, 's', $name);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
        $sql = "UPDATE categories SET nameCategories='" . mysqli_real_escape_string($conn, $name) . "' WHERE idCategories='" . mysqli_real_escape_string($conn, $id) . "'";
        $result = mysqli_query($conn, $sql);
        if ($result)
        {
            header("Location: ../modifyCategory.php?success=saved&category=exists");
            exit();
        }
        else
        {
            header("Location: ../modifyCategory.php?error=sqlerror");
            exit();
        }
    }
?>