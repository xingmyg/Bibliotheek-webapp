<?php
ob_start();
session_start();

require_once __DIR__ . '/database.php';

$stmt = $pdo->prepare("SELECT * FROM users WHERE username = :gebruikersnaam AND wachtwoord = :wachtwoord");
$stmt->bindParam(':gebruikersnaam', $_POST['gebruikersnaam']);
$stmt->bindParam(':wachtwoord', $_POST['wachtwoord']);
$stmt->execute();
$result = $stmt->fetch();

if ($result == false) {
    echo "Login klopt niet";
    $_SESSION['toegang'] = false;
}
else {
    $_SESSION['toegang'] = true;
    header('Location: admin/admin-panel.php');
}
?>

