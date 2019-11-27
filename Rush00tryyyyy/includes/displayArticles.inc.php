<?php

    function display($idArticle)
    {
        require "dbh.inc.php";

        if ($idArticle != NULL)
        {
            $sql = "SELECT idArticles, nameArticles, priceArticles, imgArticles FROM articles WHERE idArticles='" . mysqli_real_escape_string($conn, $idArticle) . "'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0)
            {
                while ($row = mysqli_fetch_assoc($result))
                {
                    echo    '<div class="card-article">
                                <img src="' .$row['imgArticles']. '" height="250" width="200">
                                <hr />
                                <div>
                                    <h5>' . $row['nameArticles'] . '</h5>
                                    <p >' . $row['priceArticles'] . '$</p>
                                    <form action="includes/addToCart.inc.php" method="post" class="text-center">
                                        <input type="hidden" name="id-article" value = "' . $row['idArticles'] . '">
                                        <input type="hidden" name="quantity-article" value = "1">';
                    if (isset($_GET['category']))
                        echo            '<input type="hidden" name="category" value = "' . $_GET['category'] . '">';
                    echo                '<button class="btn" type="submit" name="add-submit">Add to cart</button>
                                    </form>
                                </div>
                            </div>';
                }
            }
            else
                echo "There is no articles yet1";
        }
        else
        {
            $sql = "SELECT idArticles, nameArticles, priceArticles, imgArticles FROM articles";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) 
            {
                while($row = mysqli_fetch_assoc($result))
                {
                    echo    '<div class="card-article">
                                <img src="' .$row['imgArticles']. '" height="250" width="200">
                                <hr />
                                <div>
                                    <h5>' . $row['nameArticles'] . '</h5>
                                    <p >' . $row['priceArticles'] . '$</p>
                                    <form action="includes/addToCart.inc.php" method="post" class="text-center">
                                        <input type="hidden" name="id-article" value = "' . $row['idArticles'] . '">
                                        <input type="hidden" name="quantity-article" value = "1">
                                        <button class="btn" type="submit" name="add-submit">Add to cart</button>
                                    </form>
                                </div>
                            </div>';
                }
            } 
            else 
                echo "There is no articles yet2";
        }
    }
?>