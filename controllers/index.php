<?php

// If user isn't logged go to main page
if (!isset($_SESSION['logged_id'])) {
    header("Location: login.php");
    exit();
}

require_once "db/connect.php";

$purePallets = $db->query("SELECT * FROM pallets WHERE user_id='{$_SESSION['logged_id']}'")->fetchAll();
if ($purePallets) {
    foreach ($purePallets as $row) {
        $pallets[$row['palette_id']] = $db
            ->query("SELECT * FROM colors WHERE palette_id='{$row['palette_id']}'")
            ->fetchAll();
    }
}
