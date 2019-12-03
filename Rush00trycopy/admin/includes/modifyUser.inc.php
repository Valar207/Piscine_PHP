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
            $sql = "SELECT idUsers, uidUsers, emailUsers FROM users WHERE uidUsers = '" . mysqli_real_escape_string($conn, $name) . "'";
            $result = mysqli_query($conn, $sql);
            if ($result)
            {
                $row = mysqli_fetch_assoc($result);
                session_start();
                $_SESSION['userAdminId'] = $row['idUsers'];
                $_SESSION['userAdminName'] = $row['uidUsers'];
                $_SESSION['userAdminEmail'] = $row['emailUsers'];
                mysqli_free_result($result);
                header("Location: ../modifyUser.php?user=exists");
                exit();
            }
            else
            {
                header("Location: ../modifyUser.php?error=sqlerror");
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