<?php

    session_start();

    require_once "controllers/login.php";

    require_once "templates/head_form.php";
    require_once "templates/header_form.php";
    require_once "templates/mainOpen.php";

?>

<div class="titleOfForm">Login</div>

<form method="post">
    
    <input type="text" name="nick" placeholder="nick"
    <?= isset($_SESSION['given_nick']) ?
    'value="'.$_SESSION['given_nick'].'"' : '' ?>>

    <input type="password" name="password" placeholder="password">

    <?php
        if (isset($_SESSION['e_login'])) {
            echo '<div class="error">'.$_SESSION['e_login'].'</div>';
            unset($_SESSION['e_login']);    
        }
    ?>

    <input type="submit" value="Login">

    <a href="register.php">
        <div class="note">Register if you already don't have account</div>
    </a>

</form>



<?php
    require_once "templates/mainClose.php";
    require_once "templates/footer_form.php";
?>