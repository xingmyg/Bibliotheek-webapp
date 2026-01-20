<?php
session_start();

// vraag de database op, niet gevonden dan draait er niks
require_once __DIR__ . '/../database/database.php';

// prepare, want user input kan altijd veranderen, zoek of het klopt
$stmt = $pdo->prepare("SELECT * FROM users WHERE username = :gebruikersnaam AND wachtwoord = :wachtwoord");
$stmt->bindParam(':gebruikersnaam', $_POST['username']);
$stmt->bindParam(':wachtwoord', $_POST['password']);
$stmt->execute();
$result = $stmt->fetch();

// check of je toegang hebt ja of nee
if ($result == false) {
    echo "Login klopt niet";
    $_SESSION['toegang'] = false;
    header('Location: /admin/login.php');
} else {
    $_SESSION['toegang'] = true;
    header('Location: /admin/admin-panel.php');
    exit;
}