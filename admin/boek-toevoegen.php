<?php
session_start();

if (!isset($_SESSION['toegang']) || $_SESSION['toegang'] !== true) {
    header('Location: login.php');
    exit;
}

require_once __DIR__ . '/../database/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $sql = "INSERT INTO boeken (titel, auteur, isbn, omschrijving, status) VALUES (:titel, :auteur, :isbn, :omschrijving, :status)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':titel' => $_POST['titel'],
            ':auteur' => $_POST['auteur'],
            ':isbn' => $_POST['isbn'],
            ':omschrijving' => $_POST['omschrijving'],
            ':status' => $_POST['status']
        ]);

        header('Location: admin-panel.php');
        exit;
    } catch (PDOException $e) {
        $melding = "Er ging iets mis bij het opslaan: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Boek Toevoegen</title>
    <link rel="stylesheet" href="/styling/styling.css">
</head>
<body>

<?php include_once __DIR__ . '/header-admin.php'; ?>

<div class="content home">
    <div class="title">Nieuw Boek</div>

    <div class="content-box">
        <div class="general-text">
            <?php if (isset($melding)) {
                echo "<p style='color:red;'>$melding</p>";
            } ?>

            <form method="POST">
                <label>Titel:</label>
                <input type="text" name="titel" required>

                <label>Auteur:</label>
                <input type="text" name="auteur" required>

                <label>ISBN:</label>
                <input type="text" name="isbn">

                <label>Status:</label>
                <select name="status">
                    <option value="Beschikbaar">Beschikbaar</option>
                    <option value="Uitgeleend">Uitgeleend</option>
                    <option value="Niet beschikbaar">Niet beschikbaar</option>
                </select>

                <label>Omschrijving:</label>
                <textarea name="omschrijving" rows="5"></textarea>

                <button class="adminknop" type="submit">Opslaan</button>
                <a href="admin-panel.php">Annuleren</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>