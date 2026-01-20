<?php
require_once __DIR__ . '/../database/database.php';

$stmt = $pdo->query("SELECT * FROM boeken");
$boeken = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Boekenlijst</title>
    <link rel="stylesheet" href="/styling/styling.css">
</head>
<body>

<?php include_once __DIR__ . '/components/header.php'; ?>

<div class="content">
    <div class="title">Onze Collectie</div>

    <div class="content-box boekenlijst">
        <?php foreach ($boeken as $item): ?>
            <div class="general-text boek-kaart">
                <h3><?= $item['titel'] ?></h3>
                <p>Auteur: <?= $item['auteur'] ?></p>
                <br>
                <a href="boek-informatie.php?id=<?= $item['id'] ?>">Bekijk details</a>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include_once __DIR__ . '/components/footer.php'; ?>

</body>
</html>