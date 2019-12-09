<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>GameCom</title>
        <link rel="stylesheet" href="style.css?version=1">
    </head>
    <body>
        <header>
            <nav>
                <ul class="ul-nav">
                    <li class="li-nav-logo">
                        <h3>
                            <a href="index.php">GameCom</a>
                        </h3>
                    </li>
                    <?php
                        if (isset($_SESSION['userId']))
                        {
                            echo    '<li class="li-nav">
                                        <a class="li-nav-btn" href="logout.php">Logout</a>
                                    </li>';
                            if ($_SESSION['userAdmin'] == 1)
                                echo    '<li class="li-nav">
                                            <a class="li-nav-btn" href="admin/admin.php">Admin page</a>
                                        </li>';
                        }
                        else
                        {
                            echo    ' <li class="li-nav">
                                        <a class="li-nav-btn" href="signup.php">Signup</a>
                                    </li>
                                    <li class="li-nav">
                                        <a class="li-nav-btn" href="login.php">Login</a>
                                    </li>';
                        }
                        echo    '<li class="li-nav">
                                    <a class="li-nav-btn" href="cart.php">Your cart</a>
                                </li>
                                <li class="li-nav">
                                    <a class="li-nav-btn" href="profile.php">Profile</a>
                                </li>';
                    ?>
                </ul>
            </nav>
        </header>