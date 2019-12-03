<?php
    require "header.php";
?>
        <main class="container-fluid">
            <?php
                require "includes/dbh.inc.php";
                if (isset($_SESSION['articles']) && $_SESSION['articles'])
                {
                    echo '<div class="card-cart">
                            <table width="100%">
                                <thead>
                                    <tr>
                                        <th scope="col">Article</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Price</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>';
                    $articles = $_SESSION['articles'];
                    $allprices = array();

                    foreach ($articles as $idarticle => $quantity)
                    {
                        $sql = "SELECT nameArticles, priceArticles FROM articles WHERE idArticles='" . mysqli_real_escape_string($conn, $idarticle) ."'";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                        if (mysqli_num_rows($result) > 0) 
                        {
                            $price = $row['priceArticles'] * $quantity;
                            echo '<tr>';
                            echo    '<td>' . $row['nameArticles'] . '</td>';
                            echo    '<td class="text-center">' . $quantity . '</td>';
                            echo    '<td class="text-center">' . $price . '$</td>';
                            echo    '<td>
                                        <form class="form-inline" action="includes/removeArticle.inc.php" method="post">
                                            <input type="hidden" name="id-article" value = "' . $idarticle . '">
                                            <button class="btn-red" type="submit" name="remove-submit">Remove article</button>
                                        </form>
                                    </td>';
                            echo '</tr>';
                        }
                        else
                        {
                            header("Location: ../cart.php?error=sqlerror");
                            exit();
                        }
                        array_push($allprices, $price);
                        $i++;
                    }

                    foreach($allprices as $p)
                        $total = $total + $p;

                    echo '<tr>';
                    echo    '<td colspan="2" class="text-left">Total price</td>';
                    echo    '<td colspan="1" class="text-center">' . $total . '$</td>';
                    echo '</tr>';
                    echo                    '</tbody>
                                        </table>
                                    </div>';

                    if (isset($_SESSION['userId']))
                    {
                        echo '<div class="text-center">
                                <form class="form-inline" action="includes/buy.inc.php" method="post">
                                    <input type="hidden" name="idUser" value = "' . $_SESSION['userId'] . '">
                                    <button class="btn" type="submit" name="buy-submit">Buy now</button>
                                </form>
                            </div>';
                    }
                    else
                    {
                        echo '
                        <div class="text-center">
                                <p>You must signup or login in order to buy!</p>
                                <button class="btn" type="submit" name="buy-submit" disabled>Buy now</button>
                        </div>';
                    }
                }
                else
                {                        
                    if ($_GET['order'] == 'success')
                        echo '
                            <div class="rr success-msg text-center">
                                Order successfull, you will receive your items in less than a week
                            </div>';

                    echo    '<div class="card text-center">
                                <p>Your cart is empty</p>
                            </div>';
                }
            ?>
        </main>
    </body>
</html>