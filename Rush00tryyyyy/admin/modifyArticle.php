<?php
    require "admin.php";
?>
        <main>
            <?php
                if (isset($_GET['article']))
                {
                    if ($_GET['article'] == "exists")
                    {
                        echo '<div class="card">
                                <h3 class="text-center">Modify an article</h3>
                                <hr />';
                        if (isset($_GET['error']))
                        {
                            echo    '<div class="text-center">';
                            if ($_GET['error'] == "emptyfields")
                                echo                '<p class="error-msg">You need to fill all the fields</p>';
                            if ($_GET['error'] == "sqlerror")
                                echo                '<p class="error-msg">Could not find this article</p>';
                            echo    '</div>';
                        }
                        echo    '<form action="includes/modifyArticle.inc.php" method="post">
                                    <input type="hidden" name="id-article" value = "' . $_SESSION['articleId'] . '">
                                    <div>Name of the article:</div>
                                    <input type="text" name="name-article" placeholder="Name of the article" value = "' . $_SESSION['articleName'] . '">
                                    <div>Price of the article:</div>
                                    <input type="number" name="price-article" placeholder="Price of the article" value = "' . $_SESSION['articlePrice'] . '">
                                    <div class="text-center">
                                        <button class="btn" type="submit" name="save-article-submit">Save</button>
                                    </div>
                                </form>
                            </div>';
                    }
                }
                else
                {
                    echo    '<div class="card">
                                <h3 class="text-center">Modify an article</h3>
                                <hr />
                                <form action="includes/modifyArticle.inc.php" method="post" class="text-center">
                                    <input  type="text" name="name-article" placeholder="Name of the article">
                                    <button class="btn" type="submit" name="modify-article-submit">Modify this article</button>
                                </form>
                            </div>';
                }
            ?>
        </main>
    </body>
</html>