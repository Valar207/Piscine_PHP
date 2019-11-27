<?php
    require "header.php";
?>
        <main>
            <div class="card">
                <h3 class="text-center">Signup</h3>
                <hr />
                <?php
                    if (isset($_GET['error']) || isset($_GET['signup']))
                    {
                        echo '<div class="text-center">';
                        if ($_GET['error'] == "emptyfields")
                            echo '<p class="error-msg">You need to fill all the fields</p>';
                        if ($_GET['error'] == "invalidmailuid")
                            echo '<p class="error-msg">The username and the email are invalid</p>';
                        if ($_GET['error'] == "invalidmail")
                            echo '<p class="error-msg">The email is invalid</p>';
                        if ($_GET['error'] == "invaliduid")
                            echo '<p class="error-msg">The username is invalid</p>';
                        if ($_GET['error'] == "passwordcheck")
                            echo '<p class="error-msg">The passwords doesn\'t match</p>';
                        if ($_GET['error'] == "usertaken")
                            echo '<p class="error-msg">The username is taken</p>';
                        if ($_GET['signup'] == "success")
                            echo '<p class="success-msg">You signedup successfully</p>';
                        echo '</div>';
                    }
                ?>
                <form action="includes/signup.inc.php" method="post">
                    <input type="text" name="uid" placeholder="Username">
                    <input type="text" name="mail" placeholder="E-mail">
                    <input type="password" name="pwd" placeholder="Password">
                    <input type="password" name="pwd-repeat" placeholder="Repeat password">
                    <div class="text-center">
                        <button class="btn" type="submit" name="signup-submit">Signup</button>
                    </div>
                </form>
            </div>
        </main>
    </body>
</html>