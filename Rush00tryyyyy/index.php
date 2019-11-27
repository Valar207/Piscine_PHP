<?php
    require "header.php";
?>
        <main>
            <h3 class="articles-title">Articles</h3>
            <?php
                require "includes/dbh.inc.php";

                $sql = "SELECT idCategories, nameCategories FROM categories";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) 
                {
                    echo    '<form method="post" action="includes/sort.inc.php" class="sort-articles">
                                    Sort by category: 
                                    <select name="categories" class="mt-cate>';
                    echo                '<option value="All">All</option>';
                    echo                '<option value="All">All</option>';
                    while($row = mysqli_fetch_assoc($result))
                        echo            '<option value="' . $row['idCategories'] . '">' . $row['nameCategories'] . '</option>';
                    echo            '</select>
                                    <button class="btn btn-secondary btn-sm mb-1" type="submit" name="sort-submit">Sort</button>
                                </form> 
                            </div>';
                } 
                else 
                    echo "There is no categories yet";
            ?>
            <hr class="articles-hr"/>
            <div class="container-articles">
                <?php
                    require "includes/displayArticles.inc.php";

                    if (isset($_GET['category']) && $_GET['category'] != 'All')
                    {
                        $idCategory = $_GET['category'];
                        $sql2 = "SELECT idArticles FROM articlescategories WHERE idCategories='" . mysqli_real_escape_string($conn, $idCategory) . "'";
                        $result2 = mysqli_query($conn, $sql2);
                        if (mysqli_num_rows($result2) > 0)
                        {
                            while($row2 = mysqli_fetch_assoc($result2))
                                display($row2['idArticles']);
                        }
                    }
                    else
                        display(NULL);
                    if ($_GET['article'] == "cart" && isset($_GET['id']) && isset($_GET['quantity']))
                    {   
                        if (!isset($_SESSION['articles']))
                            $_SESSION['articles'] = array();
                        if (array_key_exists($_GET['id'], $_SESSION['articles']))
                            $_SESSION['articles'][$_GET['id']] += 1;
                        else
                        {
                            $article = array($_GET['id'] => $_GET['quantity']);
                            $_SESSION['articles'] = $_SESSION['articles'] + $article;
                        }
                    }
                ?>
            </div>
        </main>
    </body>
</html>