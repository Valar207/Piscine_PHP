<?php
    require "header.php";
?>
        <main>
            <div class="card">
                <h3 class="text-center">Login</h3>
                <hr />
                <?php
                    if (isset($_GET['error']) || isset($_GET['signup']))
                    {
                        echo '<div class="text-center">';
                        if ($_GET['error'] == "emptyfields")
                            echo            '<p class="error-msg">You need to fill all the fields</p>';
                        if ($_GET['error'] == "wrongpwd")
                            echo            '<p class="error-msg">Either the e-mail or the password is wrong</p>';
                        if ($_GET['error'] == "nouser")
                            echo            '<p class="error-msg">This user does not exist</p>';
                        echo '</div>';
                    }
                ?>
                <form class="form-inline" action="includes/login.inc.php" method="post">
                    <input class="form-control mr-2" type="text" name="mail" placeholder="E-mail">
                    <input class="form-control mr-2" type="password" name="pwd" placeholder="Password">
                    <div class="text-center">
                        <button class="btn" type="submit" name="login-submit">Login</button>
                    </div>
                </form>
            </div>
        </main>
    </body>
</html>