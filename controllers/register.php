<?php

// If user is logged go to main page
if (isset($_SESSION['logged_id'])) {
    header("Location: index.php");
    exit();
}

if (isset($_POST['nick']) || isset($_POST['email'])) {

    if (isset($_POST['email']))
        $_SESSION['given_email'] = $_POST['email'];

    if (isset($_POST['nick']))
        $_SESSION['given_nick'] = $_POST['nick'];

    // Flag do form is correct
    $correctForm = true;

    // Copy nick to validate
    $nick = $_POST['nick'];

    // Nick lenght validation
    if ((strlen($nick) < 3) || (strlen($nick) > 20)) {
        $correctForm = false;
        $_SESSION['e_nick'] = "Nick must have from 3 to 20 characters!";
    }

    if (!ctype_alnum($nick)) {
        $correctForm = false;
        $_SESSION['e_nick'] = "Nick can hava only letters and digits!";
    }

    // E-mail adres validation
    $email = $_POST['email'];
    $emailB = filter_var($email, FILTER_SANITIZE_EMAIL);

    if ((filter_var($emailB, FILTER_VALIDATE_EMAIL)==false) || ($emailB != $email)) {
        $correctForm = false;
        $_SESSION['e_email'] = "Incorrect e-mail adress";
    }

    // Password validate
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];

    if (strlen($password1) < 8 || strlen($password1) > 20) {
        $correctForm = false;
        $_SESSION['e_password'] = "Password must have from 8 to 20 characters!";
    }

    if ($password1 != $password2) {
        $correctForm = false;
        $_SESSION['e_password'] = "Passwords aren't the same";
    }

    $password_hash = password_hash($password1, PASSWORD_DEFAULT);

    // Let's go to db
    require_once "db/connect.php";

    // Do email already exist
    $result = $db->query("SELECT user_id FROM users WHERE email='$email'");

    if ($result->rowCount() > 0) {
        $correctForm = false;
        $_SESSION['e_email'] = "Account with this adres already exist!";
    }

    // Do nick already exist
    $result = $db->query("SELECT user_id FROM users WHERE login='$nick'");

    if ($result->rowCount() > 0) {
        $correctForm = false;
        $_SESSION['e_nick'] = "Account with this nick already exist!";
    }

    if ($correctForm) {
        $query = $db->prepare('INSERT INTO users VALUES (NULL, :login, :password, :email)');
        $query->bindValue(':login', $nick, PDO::PARAM_STR);
        $query->bindValue(':password', $password_hash, PDO::PARAM_STR);
        $query->bindValue(':email', $email, PDO::PARAM_STR);
        $query->execute();
        
        unset($_SESSION['given_nick']);
        unset($_SESSION['given_email']);
        header('Location: login.php');
        exit();
    }
}

