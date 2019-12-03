<?php
    require "admin.php";
?>
        <main>
            <div class="card">
                <h3 class="text-center">Add a user</h3>
                <hr />
                <?php
                    if (isset($_GET['error']))
                    {
                        echo    '<div class="text-center">';
                        if ($_GET['error'] == "emptyfields")
                            echo '<p class="error-msg">You need to fill all the fields</p>';
                        if ($_GET['error'] == "nametaken")
                            echo '<p class="error-msg">This name is already taken</p>';
                        echo    '</div>';
                    }
                    if (isset($_GET['user']))
                    {
                        if ($_GET['user'] == "added")
                            echo '<p class="text-center success-msg">User successfully added</p>';
                    }
                ?>
                <form action="includes/addUser.inc.php" method="post" class="text-center">
                    <input type="text" name="username" placeholder="Username">
                    <input type="text" name="email" placeholder="E-mail">
                    <input type="password" name="password" placeholder="Password">
                    <input type="checkbox" name="admin" value="true"> Make this user an admin ?
                    <button class="btn" type="submit" name="add-user-submit">Add user</button>
                </form>
            </div>
        </main>
    </body>
</html>