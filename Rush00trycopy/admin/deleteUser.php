<?php
    require "admin.php";
?>
        <main>
            <div class="card">
                <h3 class="text-center">Delete user</h3>
                <hr />
                <?php
                    if (isset($_GET['error']))
                    {
                        echo    '<div class="text-center">';
                        if ($_GET['error'] == "emptyfields")
                            echo '<p class="error-msg">You need to fill in all the fields</p>';
                        if ($_GET['error'] == "sqlerror")
                            echo '<p class="error-msg">This user doesn\'t exist</p>';
                        echo    '</div>';
                    }
                    if (isset($_GET['user']))
                    {
                        if ($_GET['user'] == "deleted")
                            echo '<p class="text-center success-msg">User successfully deleted</p>';
                    }

                ?>
                <form action="includes/deleteUser.inc.php" method="post" class="text-center">
                    <input type="text" name="name-user" placeholder="Name of the user">
                    <button class="btn" type="submit" name="delete-user-submit">Delete user</button>
                </form>
            </div>
        </main>
    </body>
</html>