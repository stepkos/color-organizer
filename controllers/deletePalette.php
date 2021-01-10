<?php

if (!isset($_SESSION['logged_id'])) {
    header("Location: login.php");
    exit();
}

require_once "db/connect.php";

$palette_id = $_GET['palette_id'];

$query = $db->prepare('SELECT user_id FROM pallets WHERE palette_id=:p_id');
$query->bindValue(':p_id', $palette_id, PDO::PARAM_INT);
$query->execute();

$result = $query->fetch();

if ($result && $result['user_id']=$_SESSION['logged_id']) {
    $query = $db->prepare('DELETE FROM pallets WHERE palette_id=:p_id');
    $query->bindValue(':p_id', $palette_id, PDO::PARAM_INT);
    $query->execute();
}

header("Location: index.php");