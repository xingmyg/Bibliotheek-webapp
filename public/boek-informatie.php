<?php
// vraag de database op, niet gevonden dan draait er niks
require_once __DIR__ . '/../database/database.php';

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
    echo "Boek niet gevonden!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Details</title>
    <link rel="stylesheet" href="/styling/styling.css">
</head>
<body>
<!-- Header in php -->
<?php include_once __DIR__ . '/components/header.php'; ?>

<div class="content">
    <div class="title">Boek informatie</div>
    <strong>
        <div class="title"><?php echo $boek['titel'] ?></div>
    </strong>
    <div class="content-box informatie">
        <div class="general-text">
            <a href="boekenlijst.php">← Terug naar de lijst</a>
            <p><strong>Auteur:</strong><?php echo $boek['auteur'] ?></p>
            <p><strong>ISBN:</strong><?php echo $boek['isbn'] ?></p>
            <p><strong>Status:</strong><?php echo $boek['status'] ?></p>
            <br>
            <h3>Omschrijving:</h3>

            <!-- Door nl2br vervangt hij enters naar br-->
            <p><?php echo nl2br($boek['omschrijving']) ?></p>
        </div>
    </div>
</div>
<!-- footer in php -->
<?php include_once __DIR__ . '/components/footer.php'; ?>
</body>
</html>