<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>GameCom</title>
        <link rel="stylesheet" type="text/css" href="../style.css">
    </head>
    <body>
        <header>
            <nav>
                <ul class="ul-nav">
                    <li class="li-nav-logo">
                        <h3>
                            <a href="../index.php">GameCom</a>
                        </h3>
                    </li>
                    <?php
                        if (isset($_SESSION['userId']))
                        {
                            echo    '<li class="li-nav">
                                        <a class="li-nav-btn" href="../logout.php">Logout</a>
                                    </li>';
                            if ($_SESSION['userAdmin'] == 1)
                                echo    '<li class="li-nav">
                                            <a class="li-nav-btn" href="admin.php">Admin page</a>
                                        </li>';
                        }
                        else
                        {
                            echo    ' <li class="li-nav">
                                        <a class="li-nav-btn" href="../signup.php">Signup</a>
                                    </li>
                                    <li class="li-nav">
                                        <a class="li-nav-btn" href="../login.php">Login</a>
                                    </li>';
                        }
                        echo    '<li class="li-nav">
                                    <a class="li-nav-btn" href="../cart.php">Your cart</a>
                                </li>
                                <li class="li-nav">
                                    <a class="li-nav-btn" href="../profile.php">Profile</a>
                                </li>';
                    ?>
                </ul>
                <ul class="ul-nav-admin">
                    <li class="li-nav-admin">
                        <a class="li-nav-btn-admin" href="addArticle.php">Add article</a>
                    </li>
                    <li class="li-nav-admin">
                        <a class="li-nav-btn-admin" href="modifyArticle.php">Modify article</a>
                    </li>
                    <li class="li-nav-admin">
                        <a class="li-nav-btn-admin" href="deleteArticle.php">Delete article</a>
                    </li>
                    <li class="li-nav-admin">
                        <a class="li-nav-btn-admin" href="addCategory.php">Add category</a>
                    </li>
                    <li class="li-nav-admin">
                        <a class="li-nav-btn-admin" href="modifyCategory.php">Modify category</a>
                    </li>
                    <li class="li-nav-admin">
                        <a class="li-nav-btn-admin" href="deleteCategory.php">Delete category</a>
                    </li>
                    <li class="li-nav-admin">
                        <a class="li-nav-btn-admin" href="addUser.php">Add user</a>
                    </li>
                    <li class="li-nav-admin">
                        <a class="li-nav-btn-admin" href="modifyUser.php">Modify user</a>
                    </li>
                    <li class="li-nav-admin">
                        <a class="li-nav-btn-admin" href="deleteUser.php">Delete user</a>
                    </li>
                    <li class="li-nav-admin">
                        <a class="li-nav-btn-admin" href="showOrders.php">Show orders</a>
                    </li>
                </ul>
            </nav>
        </header>