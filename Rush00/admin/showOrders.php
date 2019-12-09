<?php
    require "admin.php";
?>
        <main>
            <div class="card-orders">
                <h3 class="text-center">Orders</h3>
                <hr />
                <table class="table text-center" style="width:100%;">
                    <thead>
                        <tr>
                            <th>Order</th>
                            <th>User</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <?php
                        require "../includes/dbh.inc.php";

                        $sql = "SELECT idOrders, idUsers, dateOrders FROM orders";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) 
                        {
                            while($row = mysqli_fetch_assoc($result))
                            {
                                if (!($tmpIdUsers == $row['idUsers'] && $tmpDate == $row['dateOrders']))
                                {
                                    echo    '<tbody>
                                                <tr>
                                                    <td>' . $row['idOrders'] . '</td>';
                                    $iduser = $row['idUsers'];
                                    $sqlU = "SELECT uidUsers FROM users WHERE idUsers='$iduser'";
                                    $resultU = mysqli_query($conn, $sqlU);
                                    $username = mysqli_fetch_assoc($resultU);
                                    if (mysqli_num_rows($resultU) > 0)
                                        echo        '<td>' . $username['uidUsers'] . '</td>';
                                    else
                                        echo        '<td>Could not retrieve user\'s name</td>';
                                    echo            '<td>' . $row['dateOrders'] . '</td>
                                                </tr>
                                            </tbody>';
                                }
                                $tmpIdUsers = $row['idUsers'];
                                $tmpDate = $row['dateOrders'];
                            }
                        }
                    ?>
                </table>
            </div>
        </main>
    </body>
</html>