<?php
// vraag de database op, niet gevonden dan draait er niks
require_once __DIR__ . '/../../database/database.php';

// Zoekterm ophalen
$zoekterm = $_GET['zoek'] ?? '';
$resultaten = [];

// Alleen zoeken als er iets is ingevuld
if (!empty($zoekterm)) {
    try {
// Zoeken in de database (titel, ISBN of beschrijving)
        $stmt = $pdo->prepare("SELECT * FROM boeken WHERE titel LIKE :term OR isbn LIKE :term OR omschrijving LIKE :term");

// Het % teken is een wildcard, maakt niet uit wat er voor of achter de term staat
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

        <!-- is er wat ingevuld geef het terug, anders niks -->
        <?php if ($zoekterm) {
            echo "Resultaten voor: '$zoekterm'";
        } else {
            echo "Zoeken";
        } ?>
    </div>

    <div class="search-container">
        <div style="text-align: center; margin-bottom: 20px;">
            <a href="../index.php">← Terug naar home pagina</a>
        </div>

        <div class="content-box zoeken">
            <!-- als zoekterm neit leeg is en meer dan 0 boeken gevonden, ga door -->
            <?php if (!empty($zoekterm) && count($resultaten) > 0): ?>
                <?php foreach ($resultaten as $boek): ?>
                    <div class="general-text">
                        <h2><?php echo $boek['titel']; ?></h2>

                        <!-- is de status leeg, placeholder onbekend -->
                        <p><strong>Status:</strong><?php echo $boek['status'] ?? 'Onbekend'; ?></p>
                        <p><strong>ISBN:</strong><?php echo $boek['isbn']; ?></p>
                        <h3>Omschrijving:</h3>

                        <!-- Door nl2br vervangt hij enters naar br-->
                        <p><?php echo nl2br($boek['omschrijving']) ?></p>
                    </div>

                <!-- eindig for loop -->
                <?php endforeach; ?>

            <!-- eindig if statement -->
            <?php endif; ?>
        </div>
    </div>
</div>
<?php include_once __DIR__ . '/footer.php'; ?>
</body>
</html>
