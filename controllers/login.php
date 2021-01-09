<?php

// If user is nick go to main page
if (isset($_SESSION['logged_id'])) {
    header("Location: index.php");
    exit();
}

if (isset($_POST['nick']) && isset($_POST['password'])) {

    if (isset($_POST['nick']))
        $_SESSION['given_nick'] = $_POST['nick'];
        
    $nick = filter_input(INPUT_POST, 'nick');
    $password = filter_input(INPUT_POST, 'password');

    require_once 'db/connect.php';

    $query = $db->prepare('SELECT user_id, password_hash FROM users WHERE login = :nick');
    $query->bindValue(':nick', $nick, PDO::PARAM_STR);
    $query->execute();

    $user = $query->fetch();

    if ($user && password_verify($password, $user['password_hash'])) {
        $_SESSION['logged_id'] = $user['user_id'];
        unset($_SESSION['e_login']);
        header('Location: index.php');
        exit();
    }
    else {
        $_SESSION['e_login'] = "Incorrect login or password!";
    }
}