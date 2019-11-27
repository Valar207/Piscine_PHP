<?php
    require "admin.php";
?>
        <main>
            <?php
                if (isset($_GET['user']))
                {
                    if ($_GET['user'] == "exists")
                    {
                        echo '<div class="card">
                                <h3 class="text-center">Modify an user</h3>
                                <hr />';
                        if (isset($_GET['error']))
                        {
                            echo    '<div class="text-center">';
                            if ($_GET['error'] == "emptyfields")
                                echo                '<p class="error-msg">You need to fill all the fields</p>';
                            if ($_GET['error'] == "sqlerror")
                                echo                '<p class="error-msg">Could not find this user</p>';
                            echo    '</div>';
                        }
                        echo    '<form action="includes/modifyUser.inc.php" method="post">
                                    <input type="hidden" name="id-user" value = "' . $_SESSION['userAdminId'] . '">
                                    <div>Name of the user:</div>
                                    <input type="text" name="name-user" placeholder="User\'s name" value = "' . $_SESSION['userAdminName'] . '">
                                    <div>E-mail of the user:</div>
                                    <input type="text" name="email-user" placeholder="User\'s e-mail" value = "' . $_SESSION['userAdminEmail'] . '">
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
                                <h3 class="text-center">Modify an user</h3>
                                <hr />
                                <form action="includes/modifyUser.inc.php" method="post" class="text-center">
                                    <input type="text" name="name-user" placeholder="Name of the user">
                                    <button class="btn" type="submit" name="modify-user-submit">Modify this user</button>
                                </form>
                            </div>';
                }
            ?>
        </main>
    </body>
</html>