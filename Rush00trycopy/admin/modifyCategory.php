<?php
    require "admin.php";
?>
        <main>
            <?php
                if (isset($_GET['category']))
                {
                    if ($_GET['category'] == "exists")
                    {
                        echo '<div class="card">
                                <h3 class="text-center">Modify a category</h3>
                                <hr />';
                        if ($_GET['success'] == "saved")
                            echo '<p class="text-center success-msg">Category successfully changed</p>';
                        echo '<form action="includes/modifyCategory.inc.php" method="post">
                                    <input type="hidden" name="id-category" value = "' . $_SESSION['categoryId'] . '">
                                    <input type="text" name="name-category" placeholder="New name of category" value = "' . $_SESSION['categoryName'] . '">
                                    <div class="text-center">
                                        <button class="btn" type="submit" name="save-category-submit">Save</button>
                                    </div>
                                </form>
                            </div>';
                    }
                }
                else
                {
                    echo    '<div class="card">
                                <h3 class="text-center">Modify a category</h3>
                                <hr />';
                    if (isset($_GET['error']))
                    {
                        echo '<div class="text-center">';
                        if ($_GET['error'] == "emptyfields")
                            echo '<p class="error-msg">You need to fill in all the fields</p>';
                        if ($_GET['error'] == "sqlerror")
                            echo '<p class="error-msg">Could not find this category</p>';
                        echo    '</div>';
                    }
                    echo '<form action="includes/modifyCategory.inc.php" method="post" class="text-center">
                                    <input type="text" name="name-category" placeholder="Category\'s name">
                                    <button class="btn" type="submit" name="modify-category-submit">Modify this category</button>
                                </form>
                            </div>';
                }
            ?>
        </main>
    </body>
</html>