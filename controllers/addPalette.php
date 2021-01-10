<?php

if (!isset($_SESSION['logged_id'])) {
    header("Location: login.php");
    exit();
}

require_once "db/connect.php";

$db->query('INSERT INTO pallets VALUES (NULL, '.$_SESSION['logged_id'].')');

header('Location: index.php');