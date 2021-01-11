<?php

if (!isset($_SESSION['logged_id'])) {
    header("Location: login.php");
    exit();
}

require_once "db/connect.php";

$color_id = $_GET['color_id'];
$user_id = $_SESSION['logged_id'];

$query = $db->prepare('SELECT colors.color_id
    FROM users
        INNER JOIN pallets
            ON users.user_id = pallets.user_id
        INNER JOIN colors
            ON pallets.palette_id = colors.palette_id
    WHERE users.user_id = :user_id'
);

$query->bindValue(':user_id', $user_id, PDO::PARAM_INT);
$query->execute();

$result = $query->fetchAll();

if ($result) {
    foreach($result as $row) {
        if ($row['color_id'] == $color_id) {
            $query = $db->prepare('DELETE FROM colors WHERE color_id=:color_id');
            $query->bindValue(':color_id', $color_id, PDO::PARAM_INT);
            $query->execute();
            header("Location: index.php");
            exit();
        }
    }
}

header("Location: index.php");