<?php
function authenticate()
{
    if(($_SERVER['PHP_AUTH_USER']) !== 'zaz' || $_SERVER['PHP_AUTH_PW'] !== 'jaimelespetitsponeys')
    {
        header("WWW-Authenticate: Basic realm=''Espace membres''");
        header("HTTP/1.0 401 Unauthorized");
        echo "<html><body>Cette zone est accessible uniquement aux membres du site</body></html>"."\n";
        exit();
    }
}
authenticate();
$imagedata = file_get_contents("../img/42.png");
$base64 = base64_encode($imagedata);
?>
<html><body>
Bonjour Zaz<br />
<img src='data:image/png;base64,<?php echo($base64)?>'>
</body></html><?php echo "\n"?>