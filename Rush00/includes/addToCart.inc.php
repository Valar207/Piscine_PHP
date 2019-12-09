<?php
    if (isset($_POST['add-submit']))
    {
        if (!$_POST['category'])
            header("Location: ../index.php?article=cart&id=" . $_POST['id-article'] . "&quantity=" . $_POST['quantity-article']);
        else
            header("Location: ../index.php?article=cart&id=" . $_POST['id-article'] . "&quantity=" . $_POST['quantity-article'] . "&category=" . $_POST['category']);
        exit();
    }
?>