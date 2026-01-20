<?php
session_start();

if (!isset($_SESSION['toegang']) || $_SESSION['toegang'] !== true) {
    header('Location: login.php');
    exit;
}

require_once __DIR__ . '/../database/database.php';

// Check of er een ID is én of het een nummer is (veiligheid)
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    try {
        $stmt = $pdo->prepare("DELETE FROM boeken WHERE id = :id");
        $stmt->execute([':id' => $_GET['id']]);
    } catch (PDOException $e) {
        die("Kon boek niet verwijderen: " . $e->getMessage());
    }
}

header('Location: admin-panel.php');
exit;
?>