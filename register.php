<?php

    session_start();

    require_once "controllers/register.php";

    require_once "templates/head_form.php";
    require_once "templates/header_form.php";
    require_once "templates/mainOpen.php";

?>

<div class="titleOfForm">Register</div>

<form method="post">
    
    <input type="text" name="nick" placeholder="nick"
    <?= isset($_SESSION['given_nick']) ?
    'value="'.$_SESSION['given_nick'].'"' : '' ?>>

    <?php
        if (isset($_SESSION['e_nick'])) {
            echo '<div class="error">'.$_SESSION['e_nick'].'</div>';
            unset($_SESSION['e_nick']);    
        }
    ?>

    <input type="email" name="email" placeholder="email"
    <?= isset($_SESSION['given_email']) ?
    'value="'.$_SESSION['given_email'].'"' : '' ?>>

    <?php
        if (isset($_SESSION['e_email'])) {
            echo '<div class="error">'.$_SESSION['e_email'].'</div>';
            unset($_SESSION['e_email']);    
        }
    ?>

    <input type="password" name="password1" placeholder="password">

    <?php
        if (isset($_SESSION['e_password'])) {
            echo '<div class="error">'.$_SESSION['e_password'].'</div>';
            unset($_SESSION['e_password']);    
        }
    ?>

    <input type="password" name="password2" placeholder="password again">

    <input type="submit" value="Register">
</div>


<?php
    require_once "templates/mainClose.php";
    require_once "templates/footer_form.php";
?>