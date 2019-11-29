<?php
    require "header.php";
?>
        <main>
            <div class="card">
                <h3 class="text-center">Profile</h3>
                <hr />
                <?php
                if (isset($_SESSION['userId']))
                {
                    unset($_SESSION['articles']);
                    if (isset($_GET['error']) || isset($_GET['profile']))
                    {
                        echo        '<div class="text-center">';
                            if ($_GET['error'] == "sqlerror4")
                                echo    '<p class="error-msg">Could not delete profile</p>';
                            if ($_GET['profile'] == "saved")
                                echo    '<p class="success-msg">Your modifications has been saved</p>';
                        echo        '</div>';
                    }
                    echo    '<form action="includes/modify.inc.php" method="post">
                                <input type="hidden" name="id-user" value = "' . $_SESSION['userId'] . '">
                                <div>Username:</div>
                                <input type="text" name="username" placeholder="Username" value = "' . $_SESSION['userUid'] . '">
                                <div>E-mail:</div>
                                <input type="text" name="email" placeholder="E-mail" value = "' . $_SESSION['userMail'] . '">
                                <div class="text-center">
                                    <button class="btn" type="submit" name="modify-submit">Save</button>
                                </div>
                            </form>
                            <div class="text-center mt-profile">
                                <form class="form-inline" action="includes/delete.inc.php" method="post">
                                    <button class="btn-red" type="submit" name="delete-submit">Delete profile</button>
                                </form>
                            </div>';
                }
                else
                    echo    '<p class="text-center">You first need to Login or Signup to access to your profile</p>';
                ?>
            </div>
        </main>
    </body>
</html>