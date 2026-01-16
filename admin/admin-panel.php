<?php
session_start();

// Beveiliging: ben je ingelogd?
if (!isset($_SESSION['toegang']) || $_SESSION['toegang'] !== true) {
    header('Location: login.php');
    exit;
}

require_once __DIR__ . '/../database/database.php';

?>