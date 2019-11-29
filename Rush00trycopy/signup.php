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
                            echo '<p class="error-msg">You need to fill in all the fields</p>';
                        if ($_GET['error'] == "invalidmailuid")
                            echo '<p class="error-msg">Invalid email and username</p>';
                        if ($_GET['error'] == "invalidmail")
                            echo '<p class="error-msg">Invalid email</p>';
                        if ($_GET['error'] == "invaliduid")
                            echo '<p class="error-msg">Invalid username</p>';
                        if ($_GET['error'] == "passwordcheck")
                            echo '<p class="error-msg">Passwords don\'t match</p>';
                        if ($_GET['error'] == "usertaken")
                            echo '<p class="error-msg">Username taken</p>';
                        if ($_GET['signup'] == "success")
                            echo '<p class="success-msg">Signed up successfully</p>';
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