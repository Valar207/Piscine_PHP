<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="style.css?version=1">
<title>E-commerce</title>
</head>

<body>
    <header>

    <div class="box">
        <div class="one">
            <ul class="list">
            <li><a href="#">Adventure</a></li>
            <li><a href="#">Fight</a></li>
            <li><a href="#">Race</a></li>
            <li><a href="#">FPS</a></li>
            <li><a href="#">Sport</a></li>
            </ul>
        </div>

            <?php
                if(isset($_SESSION['userId']) || isset($_SESSION['userUid'])){
                        echo '<div class="four">
                                <form action="includes/logout.inc.php" method="post">
                                <button class = "logoutb" type="submit" name="logout-submit">Logout</button>
                                </form>
                            </div>
                            <div class="five">
                                <form action="includes/delete.inc.php" method="post">
                                <button class = "delaccount" type="submit" name="delete-account">Delete account</button>
                                </form>
                            </div>';
                    }
                    else{
                            echo '<div class="two">
                                    <form action="includes/login.inc.php" method="post">
                                    <input type="text" name="mailuid" placeholder="Username/E-mail">
                                    <input type="password" name="pwd" placeholder="Password">
                                    <button class = "logb" type="submit" name="login-submit">Login</button>
                                    </form>     
                                    </div>
                                    <div class="three">
                                        <a href="signup.php">Sign up</a>
                                    </div>';
                        }
            ?>
    
    </div>






            
            
            
            
            
            
            
            
            
            
            
            
            
            
            </header> 
        