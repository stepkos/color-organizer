<?php

if (!isset($_SESSION['logged_id'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['hash'])) {
    
    require_once "db/connect.php";

    $hash = $_POST['hash'];
    $palette_id = $_POST['palette_id'];

    $query = $db->prepare('SELECT user_id FROM pallets WHERE palette_id=:p_id');
    $query->bindValue(':p_id', $palette_id, PDO::PARAM_INT);
    $query->execute();

    $result = $query->fetch();

    if ($result && $result['user_id']==$_SESSION['logged_id']) {
        $query = $db->prepare('INSERT INTO colors (NULL, :p_id, :hash)');
        $query->bindValue(':p_id', $palette_id, PDO::PARAM_INT);
        $query->bindValue(':hash', $hash, PDO::PARAM_STR);
        $query->execute();
    }

    header("Location: index.php");
    exit();

}
