<?php
require "header.php";
?>

<form class="signupf" action="includes/signup.inc.php" method="post">
    <input type="text" name="username" placeholder="Username"/>
    <input type="text" name="email" placeholder="Email"/>
    <input type="password" name="pwd1" placeholder="Password"/>
    <input type="password" name="pwd2" placeholder="Retype password"/>
    <button type="submit" value="submit">Submit</button>
</form>

<?php

if(isset($_POST['username'])){
    echo $_POST['username'];
}

?>