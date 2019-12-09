<?php
    require "admin.php";
?>
        <main>
            <div class="card">
                <h3 class="text-center">Delete category</h3>
                <hr />
                <?php
                    if (isset($_GET['error']) || isset($_GET['category']))
                    {
                        echo '<div class="text-center">';
                        if ($_GET['error'] == "emptyfields")
                            echo '<p class="error-msg">You need to fill in all the fields</p>';
                        if ($_GET['error'] == "sqlerror")
                            echo '<p class="error-msg">Category doesn\'t exist</p>';
                        if ($_GET['category'] == "deleted")
                            echo '<p class="success-msg">Category deleted succesfully</p>';
                        echo    '</div>';
                    }
                ?>
                <form action="includes/deleteCategory.inc.php" method="post" class="text-center">
                    <input type="text" name="name-category" placeholder="Name of the category">
                    <button class="btn" type="submit" name="delete-category-submit">Delete category</button>
                </form>
            </div>
        </main>
    </body>
</html> 