<?php
//De variabelen met de gegevens voor de databaseverbinding.
$host = "db";
$dbname = "bibliotheek";
$user = "biblio";
$password = "secret";

// verbindt PHP met de MySQL database
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);

// Zorgt dat we foutmeldingen krijgen als er iets mis is met SQL (zet een instelling)
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// zet de foutmelding in een variabel
} catch (PDOException $e) {

    // Stop het script en toon de fout
    die("Verbinding mislukt: " . $e->getMessage());
}