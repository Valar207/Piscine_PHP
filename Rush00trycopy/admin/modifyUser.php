<?php
    require "admin.php";
?>
        <main>
            <?php
                if (isset($_GET['user']))
                {
                    if ($_GET['user'] == "exists" || $_GET['user'] == "saved")
                    {
                        echo '<div class="card">
                                <h3 class="text-center">Modify user</h3>
                                <hr />';
                        if (isset($_GET['error']))
                        {
                            echo    '<div class="text-center">';
                            if ($_GET['error'] == "emptyfields")
                                echo '<p class="error-msg">You need to fill all in the fields</p>';
                            if ($_GET['error'] == "sqlerror")
                                echo '<p class="error-msg">Could not find this user</p>';
                            echo    '</div>';
                        }
                        if ($_GET['user'] == "saved")
                            echo '<p class="text-center success-msg">User successfully changed</p>';
                        if ($_GET['error'] == "emptyfields2")
                            echo '<p class="text-center error-msg">You need to fill in all the fields</p>';
                        echo    '<form action="includes/modifyUser.inc.php" method="post">
                                    <input type="hidden" name="id-user" value = "' . $_SESSION['userAdminId'] . '">
                                    <div class="text-center">New user name:</div>
                                    <input type="text" name="name-user" placeholder="User name" value = "' . $_SESSION['userAdminName'] . '">
                                    <div class="text-center">New e-mail user:</div>
                                    <input type="text" name="email-user" placeholder="E-mail user" value = "' . $_SESSION['userAdminEmail'] . '">
                                    <div class="text-center">
                                        <button class="btn" type="submit" name="save-user-submit">Save</button>
                                    </div>
                                </form>
                            </div>';
                    }
                }
                else
                {
                    echo    '<div class="card">
                                <h3 class="text-center">Modify user</h3>
                                <hr />';
                    if ($_GET['error'] == 'emptyfields')
                        echo '<p class="text-center error-msg">You need to fill in all the fields</p>';
                    if ($_GET['error'] == 'nouser')
                        echo '<p class="text-center error-msg">This user doesn\'t exist</p>';
                    echo '<form action="includes/modifyUser.inc.php" method="post" class="text-center">
                                    <input type="text" name="name-user" placeholder="Name of the user">
                                    <button class="btn" type="submit" name="modify-user-submit">Modify this user</button>
                                </form>
                            </div>';
                }
            ?>
        </main>
    </body>
</html>