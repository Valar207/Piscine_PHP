<?php
    session_start();
    $login = $_GET['login'];
    $passwd = $_GET['passwd'];
    $submit = $_GET['submit'];
    if (isset($login) && isset($passwd) && $submit === 'OK')
    {
        $_SESSION['login'] = $login;
        $_SESSION['passwd'] = $passwd;
    }
?>
<html><body>
    <form action="index.php" method="get">
    Identifiant: <input type="text" name="login" value="<?php echo $_SESSION['login']; ?>"/>
    <br />
    Mot de passe: <input type="password" name="passwd" value="<?php echo $_SESSION['passwd']; ?>">
    <input type="submit" name="submit" value="OK">
    </form>
</body></html>