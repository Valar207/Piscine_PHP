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
                                <hr />
                                <form action="includes/modifyCategory.inc.php" method="post">
                                    <input type="hidden" name="id-category" value = "' . $_SESSION['categoryId'] . '">
                                    <div>Name of the category:</div>
                                    <input type="text" name="name-category" placeholder="Name of the category" value = "' . $_SESSION['categoryName'] . '">
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
                                <hr />
                                <form action="includes/modifyCategory.inc.php" method="post" class="text-center">
                                    <input type="text" name="name-category" placeholder="Name of the category">
                                    <button class="btn" type="submit" name="modify-category-submit">Modify this category</button>
                                </form>
                            </div>';
                }
                if (isset($_GET['error']))
                {
                    echo    '<div class="text-center">';
                    if ($_GET['error'] == "emptyfields")
                        echo                '<p class="error-msg">You need to fill all the fields</p>';
                    if ($_GET['error'] == "sqlerror")
                        echo                '<p class="error-msg">Could not find this category</p>';
                    echo    '</div>';
                }
            ?>
        </main>
    </body>
</html>