<?php
session_start();
include('auth.php');

$login = $_GET['login'];
$passwd = $_GET['passwd'];

if (auth($login,$passwd) == TRUE)
{
    $_SESSION['loggued_on_user'] = $login;
?>

<html>
<style>
    body{
        margin: auto;
        text-align: center;
        background-color: #4887B0;
    }
    iframe{
        background-color: #DAAD86;
        margin: 5px;
        border-radius: 20px;
    }
    h2{
        margin-left : 100px;
        font-family: Verdana, Tahoma, sans-serif;
        color: white;
        margin: 10px;
    }
    a{
        font-family: Verdana, Tahoma, sans-serif;
    }

</style>    
<body>
    <h2>Welcome <?php echo $_SESSION['loggued_on_user']; ?>!</h2>
    <a href="logout.php">Log out</a><br>
    <iframe name="chat" src="chat.php" width="90%" height="550px"></iframe>
    <iframe name="speak" src="speak.php" width="90%" height="50px"></iframe>
</body></html>

<?php
}
else
{
    $_SESSION['loggued_on_user'] = '';
    echo "ERROR\n";
}
?>

