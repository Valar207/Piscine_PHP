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
</main>


<?php
require "footer.php";
?> 