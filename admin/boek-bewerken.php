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

// Update de kolom en door de WHERE past hij alleen eht boek aan emt die ID
    $sql = "UPDATE boeken SET titel = :titel, auteur = :auteur, isbn = :isbn, omschrijving = :omschrijving, status = :status WHERE id = :id";

// Hij bereidt alvast voor op wat er komt
    $stmt = $pdo->prepare($sql);

// Hij voert het uit en past aan wat aangepast is
    $stmt->execute([
        ':titel' => $_POST['titel'],
        ':auteur' => $_POST['auteur'],
        ':isbn' => $_POST['isbn'],
        ':omschrijving' => $_POST['omschrijving'],
        ':status' => $_POST['status'],
        ':id' => $_POST['id']
    ]);

    header('Location: admin-panel.php');
    exit;
}
// Haal via GET de id op uit de URL
$id = $_GET['id'] ?? null;

// prepare, want user input kan altijd veranderen
$stmt = $pdo->prepare("SELECT * FROM boeken WHERE id = :id");

// vervang placeholder voor ID
$stmt->execute([':id' => $id]);

// Ga op zoek naar het juiste boek
$boek = $stmt->fetch(PDO::FETCH_ASSOC);

//als het boek niet bestaat, exit
if (!$boek) {
    echo "Boek niet gevonden.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Boek Bewerken</title>
    <link rel="stylesheet" href="/styling/styling.css">
</head>
<body>
<!-- aparte admin header in php -->
<?php include_once __DIR__ . '/header-admin.php'; ?>

<div class="content home">
    <div class="title">Boek Bewerken</div>

    <div class="content-box">
        <div class="general-text">
            <form method="POST">
                <!-- alle informatie invullen -->
                <input type="hidden" name="id" value="<?= $boek['id'] ?>">

                <label>Titel:</label>
                <input type="text" name="titel" value="<?= $boek['titel'] ?>" required>

                <label>Auteur:</label>
                <input type="text" name="auteur" value="<?= $boek['auteur'] ?>" required>

                <label>ISBN:</label>
                <input type="text" name="isbn" value="<?= $boek['isbn'] ?>">

                <label>Status:</label>
                <select name="status">
                    <!-- status van het boek selecteren -->
                    <option value="Beschikbaar"<?php echo $boek['status'] == 'Beschikbaar' ? 'selected' : '' ?>>
                        Beschikbaar
                    </option>
                    <option value="Uitgeleend"<?php echo $boek['status'] == 'Uitgeleend' ? 'selected' : '' ?>>
                        Uitgeleend
                    </option>
                    <option value="Niet beschikbaar"<?php echo $boek['status'] == 'Niet beschikbaar' ? 'selected' : '' ?>>
                        Niet
                        beschikbaar
                    </option>
                </select>

                <label>Omschrijving:</label>
                <textarea name="omschrijving" rows="5"><?php echo $boek['omschrijving'] ?></textarea>
                <!-- verstuurt het formulier -->
                <button class="adminknop" type="submit">Wijzigingen Opslaan</button>
                <a href="admin-panel.php">Annuleren</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>