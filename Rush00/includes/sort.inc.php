<?php
    if (isset($_POST['sort-submit']))
    {
        $idCategory = $_POST['categories'];
        header("Location: ../index.php?category=" . $idCategory);
        exit();
    }
?>