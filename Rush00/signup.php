<?php
require "header.php";
?>

<main>

    <div class="signup">
    <h1>Signup</h1>
    <?php
        if (isset($_GET['error'])){
            if ($_GET['error'] == "emptyfields"){
                echo "<p style=color:red;>Fill in all fields!</p>";
            }
            elseif($_GET['error'] == "invaliduidmail"){
                echo "<p style=color:red;>Invalid username and e-mail!</p>";
            }
            elseif($_GET['error'] == "invaliduid"){
                echo "<p style=color:red;>Invalid username!</p>";
            }
            elseif($_GET['error'] == "invalidmail"){
                echo "<p style=color:red;>Invalid e-mail!</p>";
            }
            elseif($_GET['error'] == "passwordcheck"){
                echo "<p style=color:red;>Your passwords do not match!</p>";
            }
            elseif($_GET['error'] == "usertaken"){
                echo "<p style=color:red;>Username or email already taken!</p>";
            }
        }
        elseif($_GET['signup'] == "success"){
            echo "<p style=color:green;>Sign up successful!</p>";
        }
    ?>

    <form class="signupf" action="includes/signup.inc.php" method="post">
        <input class="i1" type="text" name="uid" placeholder="Username">
        <input class="i2" type="text" name="mail" placeholder="E-mail">
        <input class="i3" type="password" name="pwd" placeholder="Password">
        <input class="i4" type="password" name="pwd2" placeholder="Repeat password">
        <button class="i5" type="submit" name="signup-submit">Signup</button>
    
    </form>
    
    </div>



</main>


<?php
require "footer.php";
?> 