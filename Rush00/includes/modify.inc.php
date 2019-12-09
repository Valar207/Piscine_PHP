<?php
    if (isset($_POST['modify-submit']))
    {
        require "dbh.inc.php";

        $id = $_POST['id-user'];
        $username = $_POST['username'];
        $email = $_POST['email'];

        $sql = "UPDATE users SET uidUsers='" . mysqli_real_escape_string($conn, $username) . "', emailUsers='" . mysqli_real_escape_string($conn, $email) . "' WHERE idUsers='" . mysqli_real_escape_string($conn, $id) . "'";
        $result = mysqli_query($conn, $sql);
        if ($result)
        {
            session_start();
            $_SESSION['userUid'] = $username;
            $_SESSION['userMail'] = $email;
            header("Location: ../profile.php?profile=saved");
            exit();
        }
        else
        {
            header("Location: ../profile.php?error=sqlerror");
            exit();
        }
    }
?>