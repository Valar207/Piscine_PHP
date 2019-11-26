<?php
require "header.php";
?>

<main>
    <?php
        if(isset($_SESSION['userId'])){
            echo '<p>You are loggued in!</p>';
        }
        else{
            echo '<p>You are loggued out!</p>';
        }
    ?>
    <img src="./img/GTA_V.jpeg" alt="gta">
    <img src="./img/MKX.jpeg" alt="mkx">
    <img src="./img/CODMW.jpeg" alt="cod">
</main>


<?php
require "footer.php";
?> 