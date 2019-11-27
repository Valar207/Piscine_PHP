<?php
    if (isset($_POST['delete-user-submit']))
    {
        require "../../includes/dbh.inc.php";

        $name = $_POST['name-user'];

        if (!empty($name))
        {
            $sql = "DELETE FROM users WHERE uidUsers = '" . mysqli_real_escape_string($conn, $name) . "'";
            if (mysqli_query($conn, $sql))
            {
                header("Location: ../admin.php?user=deleted");
                exit();
            }
            else
            {
                header("Location: ../deleteUser.php?error=sqlerror");
                exit();
            }
        }
        else
        {
            header("Location: ../deleteUser.php?error=emptyfields");
            exit();
        }
    }
    else
    {
        header("Location: ../../index.php");
        exit();
    }
?>