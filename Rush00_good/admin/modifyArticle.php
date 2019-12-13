<?php
    require "admin.php";
?>
        <main>
            <?php
                if (isset($_GET['article']))
                {
                    if ($_GET['article'] == "exists" || $_GET['article'] == "empty")
                    {
                        echo '<div class="card">
                                <h3 class="text-center">Modify an article</h3>
                                <hr />';
                                if ($_GET['success'] == 'saved')
                                    echo '<p class="text-center success-msg">Changes saved</p>';
                                if ($_GET['article'] == 'empty')
                                    echo '<p class="text-center error-msg">You need to fill in all the fields</p>';
                        echo    '<form action="includes/modifyArticle.inc.php" method="post">
                                    <input type="hidden" name="id-article" value = "' . $_SESSION['articleId'] . '">
                                    <div class="text-center">New name of the article:</div>
                                    <input type="text" name="name-article" placeholder="Name of the article" value = "' . $_SESSION['articleName'] . '">
                                    <div class="text-center">Price of the article:</div>
                                    <input type="number" step=0.01 min="0.01" name="price-article" placeholder="Price of the article" value = "' . $_SESSION['articlePrice'] . '">
                                    <div class="text-center">
                                        <button class="btn" type="submit" name="save-article-submit">Save</button>
                                    </div>
                                </form>
                            </div>';
                    }
                }
                else
                {
                         ?>    <div class="card">
                                <h3 class="text-center">Modify article</h3>
                                <hr />
                                <?php
                                if ($_GET['error'] == 'emptyfields')
                                    echo '<p class="text-center error-msg">You need to fill in all the fields</p>';
                                if ($_GET['error'] == 'noexist')
                                    echo '<p class="text-center error-msg">Article doesn\'t exist</p>';
                                ?>
                                <form action="includes/modifyArticle.inc.php" method="post" class="text-center">
                                    <input  type="text" name="name-article" placeholder="Name of the article">
                                    <button class="btn" type="submit" name="modify-article-submit">Modify this article</button>
                                </form>
                            </div>
                            <?php
                }
            ?>
        </main>
    </body>
</html>