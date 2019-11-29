<?php
    require "admin.php";
?>
        <main>
            <div class="card">
                <h3 class="text-center">Delete article</h3>
                <hr />
                <?php
                    if (isset($_GET['error']) || isset($_GET['article']))
                    {
                        echo '<div class="text-center">';
                        if ($_GET['error'] == "emptyfields")
                            echo '<p class="error-msg">You need to fill in all the fields</p>';
                        elseif ($_GET['error'] == "sqlerror")
                            echo '<p class="error-msg">Could not delete the article</p>';
                        elseif ($_GET['error'] == "noexist")
                            echo '<p class="error-msg">Article doesn\'t exist</p>';
                        elseif ($_GET['article'] == "deleted")
                            echo '<p class="success-msg">Article succesfully deleted</p>';
                        echo '</div>';
                    }
                ?>
                <form action="includes/deleteArticle.inc.php" method="post" class="text-center">
                    <input type="text" name="name-article" placeholder="Name of the article">
                    <button class="btn" type="submit" name="delete-article-submit">Delete article</button>
                </form>
            </div>
        </main>
    </body>
</html>