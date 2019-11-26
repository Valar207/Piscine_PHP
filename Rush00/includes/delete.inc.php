<?php
session_start();
$conn = mysqli_connect("localhost", "root", "valar207", "commerce");

$user = $_SESSION['userUid'];

$sql = "DELETE FROM users WHERE uidUsers=?";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)){
    header("Location: ../index.php?error=sqlerror");
    exit();
}
else{
    mysqli_stmt_bind_param($stmt, "s", $user);
    mysqli_stmt_execute($stmt);
    session_unset();
    session_destroy();
    header("Location: ../index.php");
    exit();
}
