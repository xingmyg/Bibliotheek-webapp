<?php
require_once __DIR__ . '/../database/database.php';

$id = $_GET['id'] ?? null;
$stmt = $pdo->prepare("SELECT * FROM boeken WHERE id = :id");
$stmt->execute([':id' => $id]);
$boek = $stmt->fetch(PDO::FETCH_ASSOC);

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

<?php include_once __DIR__ . '/components/header.php'; ?>

<div class="content">
    <div class="title">Boek informatie</div>
    <strong>
        <div class="title"><?= $boek['titel'] ?></div>
    </strong>
    <div class="content-box informatie">
        <div class="general-text">
            <a href="boekenlijst.php">← Terug naar de lijst</a>
            <p><strong>Auteur:</strong> <?= $boek['auteur'] ?></p>
            <p><strong>ISBN:</strong> <?= $boek['isbn'] ?></p>
            <p><strong>Status:</strong> <?= $boek['status'] ?></p>
            <br>
            <h3>Omschrijving:</h3>
            <p><?= nl2br($boek['omschrijving']) ?></p>
        </div>
    </div>
</div>

<?php include_once __DIR__ . '/components/footer.php'; ?>

</body>
</html>