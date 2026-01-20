<?php
session_start();

// check of de gebruiken geen toegang heeft, anders stuur terug
if (!isset($_SESSION['toegang']) || $_SESSION['toegang'] !== true) {
    header('Location: login.php');
    exit;
}
// vraag de database op, niet gevonden dan draait er niks
require_once __DIR__ . '/../database/database.php';

// Is het formulier ingevuld en identiek aan post
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
// Voeg toe aan de kolom en
        $sql = "INSERT INTO boeken (titel, auteur, isbn, omschrijving, status) VALUES (:titel, :auteur, :isbn, :omschrijving, :status)";

// Hij bereidt alvast voor op wat er komt
        $stmt = $pdo->prepare($sql);

// Hij voert de opdracht uit en slaat het nieuwe boek op in de database
        $stmt->execute([
            ':titel' => $_POST['titel'],
            ':auteur' => $_POST['auteur'],
            ':isbn' => $_POST['isbn'],
            ':omschrijving' => $_POST['omschrijving'],
            ':status' => $_POST['status'],
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
<!-- aparte admin header in php -->
<?php include_once __DIR__ . '/header-admin.php'; ?>

<div class="content home">
    <div class="title">Nieuw Boek</div>

    <div class="content-box">
        <div class="general-text">
            <?php if (isset($melding)) {
                echo "<p>$melding</p>";
            } ?>

            <form method="POST">
                <!-- alle informatie invullen -->
                <label>Titel:</label>
                <input type="text" name="titel" required>

                <label>Auteur:</label>
                <input type="text" name="auteur" required>

                <label>ISBN:</label>
                <input type="text" name="isbn">

                <label>Status:</label>
                <select name="status">
                    <!-- status van het boek selecteren -->
                    <option value="Beschikbaar">Beschikbaar</option>
                    <option value="Uitgeleend">Uitgeleend</option>
                    <option value="Niet beschikbaar">Niet beschikbaar</option>
                </select>

                <label>Omschrijving:</label>
                <textarea name="omschrijving" rows="5"></textarea>
                <!-- verstuurt het formulier -->
                <button class="adminknop" type="submit">Opslaan</button>
                <a href="admin-panel.php">Annuleren</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>