<?php

if (!isset($_SESSION['logged_id'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['hash'])) {
    
    require_once "db/connect.php";

    $hash = $_POST['hash'];
    $palette_id = $_GET['palette_id'];

    if (!preg_match('/^#[a-fA-F0-9]{6}$/', $hash)) {
        $_SESSION['incorrect_regex'] = true;
        header('Location: addColor.php?palette_id='.$palette_id);
        exit();
    }

    $hash = strtoupper($hash);

    $query = $db->prepare('SELECT user_id FROM pallets WHERE palette_id=:p_id');
    $query->bindValue(':p_id', $palette_id, PDO::PARAM_INT);
    $query->execute();

    $result = $query->fetch();

    if ($result && $result['user_id'] == $_SESSION['logged_id']) {
        $query = $db->prepare('INSERT INTO colors VALUES (NULL, :p_id, "'.$hash.'")');
        $query->bindValue(':p_id', $palette_id, PDO::PARAM_INT);
        $query->execute();
    }

    header("Location: index.php");
    exit();

}
