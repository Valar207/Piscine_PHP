<?php
    require "admin.php";
?>
        <main>
            <div class="card">
                <h3 class="text-center">Add a new article</h3>
                <hr />
                <?php
                    if (isset($_GET['error']))
                    {
                        echo '<div class="text-center">';
                        if ($_GET['error'] == "emptyfields")
                            echo                '<p class="error-msg">You need to fill all the fields</p>';
                        if ($_GET['error'] == "nametaken")
                            echo                '<p class="error-msg">This name is already taken</p>';
                        echo '</div>';
                    }
                ?>
                <form action="includes/addArticle.inc.php" method="post" class="text-center" enctype="multipart/form-data">
                    <input type="text" name="name-article" placeholder="Name of the article">
                    <input type="number" name="price-article" placeholder="Price of the article">
                    <?php
                        require "../includes/dbh.inc.php";
                        $sql = "SELECT idCategories, nameCategories FROM categories";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) 
                        {
                            echo        '<p>Articles Category</p>
                                        <div class="list-cat text-left">';
                            while($row = mysqli_fetch_assoc($result))
                                echo        '<input class="ml-1 mt-article" type="checkbox" name="categories[]" value="' . $row['idCategories'] . '" class="ml-2 mb-2"> ' . $row['nameCategories'] . '<br>';
                            echo        '</div>';
                        } 
                        else 
                            echo "Can't display the categories</br>";
                    ?>
                    <p class="mt-1">Upload article image</p>
                    <input type="file" name="img-article" accept="image/png, image/jpeg">       
                    <button class="btn" type="submit" name="add-article-submit">Add article</button>
                </form>
            </div>
        </main>
    </body>
</html>