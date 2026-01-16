<?php
ob_start();
session_start();

require_once __DIR__ . '/../database/database.php';

// FIX 2: Zorg dat de :namen in de query precies matchen met bindParam
$stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username AND wachtwoord = :password");

$stmt->bindParam(':username', $_POST['username']);
$stmt->bindParam(':password', $_POST['password']);
$stmt->execute();
$result = $stmt->fetch();

if ($result == false) {
    echo "Login klopt niet";
    $_SESSION['toegang'] = false;
}
else {
    $_SESSION['toegang'] = true;
    header('Location: admin-panel.php');
    exit;
}
?>
