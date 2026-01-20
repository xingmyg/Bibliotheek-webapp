<?php
$host = "db";
$dbname = "bibliotheek";
$user = "biblio";
$password = "secret";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    // Zorgt dat we foutmeldingen krijgen als er iets mis is met SQL
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Stop het script en toon de fout
    die("Verbinding mislukt: " . $e->getMessage());
}