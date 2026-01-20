<?php
// 1. Verbinding maken met de database
// We moeten nu TWEE mappen terug (../../) om bij de database map te komen
require_once __DIR__ . '/../../database/database.php';

// 2. Zoekterm ophalen
$zoekterm = $_GET['zoek'] ?? '';
$resultaten = [];

// Alleen zoeken als er iets is ingevuld
if (!empty($zoekterm)) {
    try {
        // Zoeken in de database (titel, ISBN of beschrijving)
        $stmt = $pdo->prepare("SELECT * FROM boeken WHERE titel LIKE :term OR isbn LIKE :term OR omschrijving LIKE :term");
        $stmt->execute([':term' => '%' . $zoekterm . '%']);
        $resultaten = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Fout: " . $e->getMessage();
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Zoeken - De Boekenreus</title>
    <link rel="stylesheet" href="/styling/styling.css">
</head>
<body>

<?php include_once __DIR__ . '/header.php'; ?>

<div class="content">
    <div class="title">
        <?php echo $zoekterm ? "Resultaten voor: '$zoekterm'" : "Zoeken"; ?>
    </div>
    <div class="general-text">
        <a href="../index.php">← Terug naar home pagina</a>
    <div class="content-box">
        <?php if (!empty($zoekterm) && count($resultaten) > 0): ?>

            <?php foreach ($resultaten as $boek): ?>
                <div class="general-text">
                    <h2><?php echo $boek['titel']; ?></h2>

                    <p><strong>Status:</strong> <?php echo $boek['status'] ?? 'Onbekend'; ?></p>
                    <p><strong>ISBN:</strong> <?php echo $boek['isbn']; ?></p>
                    <br>
                    <p><?php echo $boek['omschrijving']; ?></p>
                </div>
            <?php endforeach; ?>

        <?php elseif (!empty($zoekterm)): ?>
            <div class="general-text">
                <p>Geen boeken gevonden voor '<?php echo $zoekterm; ?>'.</p>
            </div>

        <?php else: ?>
            <div class="general-text">
                <p>Vul hierboven een zoekterm in.</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php include_once __DIR__ . '/footer.php'; ?>

</body>
</html>