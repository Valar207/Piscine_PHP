<?php
    if (isset($_POST['add-user-submit']))
    {
        require "../../includes/dbh.inc.php";

        $username = $_POST['username'];
        $email = $_POST['email'];
		$password = $_POST['password'];
		if ($_POST['admin'] == 'true')
			$admin = 1;
		else
			$admin = NULL;

        if (empty($username) || empty($email) || empty($password))
        {
            header("Location: ../addUser.php?error=emptyfields");
            exit();
        }
        else
        {
            $sql = "SELECT uidUsers FROM users WHERE uidUsers=?";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql))
            {
                header("Location: ../addUser.php?error=sqlerror1");
                exit();
            }
            else
            {
                mysqli_stmt_bind_param($stmt, "s", $username);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $resultCheck = mysqli_stmt_num_rows($stmt);
                if ($resultCheck > 0)
                {
                    header("Location: ../addUser.php?error=nametaken");
                    exit();
                }
                else
                {
                    $sql = "INSERT INTO users (uidUsers, emailUsers, adminUsers, pwdUsers) VALUES (?, ?, ?, ?)";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sql))
                    {
                        header("Location: ../addUser.php?error=sqlerror2");
                        exit();
                    }
                    else
                    {
						$hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                        mysqli_stmt_bind_param($stmt, "ssis", $username, $email, $admin, $hashedPwd);
                        mysqli_stmt_execute($stmt);
                        header("Location: ../admin.php?user=added");
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
        header("Location: ../addArticle.php");
        exit();
    }