<?php

    session_start();

    require_once "templates/head_form.php";

    require_once "templates/header_form.php";
    require_once "templates/mainOpen.php";

?>

<div class="titleOfForm">Register</div>

<form method="post">
    
    <input type="text" name="login" placeholder="login">

    <input type="email" name="email" placeholder="email">

    <input type="password" name="password1" placeholder="password">

    <input type="password" name="password2" placeholder="password again">

    <input type="submit" value="Register">
</div>


<?php
    require_once "templates/mainClose.php";
    require_once "templates/footer.php";
?>