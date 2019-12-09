<?php
    if (isset($_POST['modify-user-submit']))
    {
        require "../../includes/dbh.inc.php";

        $name = $_POST['name-user'];

        if (empty($name))
        {
            header("Location: ../modifyUser.php?error=emptyfields");
            exit();
        }
        else
        {
            $sql = "SELECT idUsers, uidUsers, emailUsers FROM users WHERE uidUsers = ?";
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
                $sql = "SELECT idUsers, uidUsers, emailUsers FROM users WHERE uidUsers = ?";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)){
                    header("Location: ../admin.php?error=sqlerror");
                    exit();
                }
                mysqli_stmt_bind_param($stmt, 's', $name);
                mysqli_stmt_execute($stmt);
                $res = mysqli_stmt_get_result($stmt);
                $row = mysqli_fetch_assoc($res);
                session_start();
                $_SESSION['userAdminId'] = $row['idUsers'];
                $_SESSION['userAdminName'] = $row['uidUsers'];
                $_SESSION['userAdminEmail'] = $row['emailUsers'];
                mysqli_free_result($res);
                header("Location: ../modifyUser.php?user=exists");
                exit();
            }
            else
            {
                header("Location: ../modifyUser.php?error=nouser");
                exit();
            }
        }
    }
    else if (isset($_POST['save-user-submit']))
    {
        require "../../includes/dbh.inc.php";

        $id = $_POST['id-user'];
        $name = $_POST['name-user'];
        $email = $_POST['email-user'];

        if (empty($name) || empty($email))
        {
            header("Location: ../modifyUser.php?error=emptyfields2&user=exists");
            exit();
        }

        $sql = "SELECT uidUsers FROM users WHERE uidUsers = ?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../admin.php?error=sqlerror");
            exit();
        }
        mysqli_stmt_bind_param($stmt, 's', $name);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
        $sql = "UPDATE users SET uidUsers='" . mysqli_real_escape_string($conn, $name) . "', emailUsers='" . mysqli_real_escape_string($conn, $email) . "' WHERE idUsers='" . mysqli_real_escape_string($conn, $id) . "'";
        $result = mysqli_query($conn, $sql);
        if ($result)
        {
            header("Location: ../modifyUser.php?user=saved");
            exit();
        }
        else
        {
            header("Location: ../modifyUser.php?error=sqlerror");
            exit();
        }
    }
?>