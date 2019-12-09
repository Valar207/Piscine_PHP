<?php
    require "admin.php";
?>
        <main>
            <div class="card">
                <h3 class="text-center">Add a new category</h3>
                <hr />
                <?php
                    if (isset($_GET['error']))
                    {
                        echo    '<div class="text-center">';
                        if ($_GET['error'] == "emptyfields")
                            echo '<p class="error-msg">You need to fill in all the fields</p>';
                        if ($_GET['error'] == "nametaken")
                            echo '<p class="error-msg">This name is already taken</p>';
                        echo    '</div>';
                    }
                    if (isset($_GET['category']))
                    {
                        if ($_GET['category'] == "added")
                        echo    '<div class="text-center">';
                        echo '<p class="success-msg">Category added successfully</p>';
                        echo    '</div>';
                    }
                ?>
                <form action="includes/addCategory.inc.php" method="post" class="text-center">
                    <input type="text" name="name-category" placeholder="Name of the category">
                    <button class="btn" type="submit" name="add-category-submit">Add category</button>
                </form>
            </div>
        </main>
    </body>
</html>