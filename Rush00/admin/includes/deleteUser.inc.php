<?php
    if (isset($_POST['delete-user-submit']))
    {
        require "../../includes/dbh.inc.php";

        $name = $_POST['name-user'];

        if (!empty($name))
        {

            $sql = "SELECT uidUsers FROM users WHERE uidUsers = ?";
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
                $sql = "DELETE FROM users WHERE uidUsers = '" . mysqli_real_escape_string($conn, $name) . "'";
                mysqli_query($conn, $sql);
                header("Location: ../deleteUser.php?user=deleted");
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