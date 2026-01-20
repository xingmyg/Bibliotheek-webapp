<?php
// vraag de database op, niet gevonden dan draait er niks
require_once __DIR__ . '/../database/database.php';

// Ik gebruik hier query omdat ik gewoon de lijst opvraag en die blijft hetzelfde
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
<!-- Header in php -->
<?php include_once __DIR__ . '/components/header.php'; ?>

<div class="content">
    <div class="title">Onze Collectie</div>

    <div class="content-box boekenlijst">
        <!-- Ik gebruik een for each loop om door de opgehaalde lijst te kunnen gaan, $boeken zet ik nu om in $item -->
        <?php foreach ($boeken as $item): ?>
            <div class="general-text boek-kaart">
                <h3><?php echo $item['titel'] ?></h3>
                <p>Auteur:<?php echo $item['auteur'] ?></p>
                <p>Status:<?php echo $item['status'] ?></p>
                <br>
                <!-- informatie vraag ik via het boek ID op.-->
                <a href="boek-informatie.php?id=<?php echo $item['id'] ?>">Bekijk details</a>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<!-- footer in php -->
<?php include_once __DIR__ . '/components/footer.php'; ?>
</body>
</html>