<?php
session_start();

// check of de gebruiken geen toegang heeft, anders stuur terug
if (!isset($_SESSION['toegang']) || $_SESSION['toegang'] !== true) {
    header('Location: login.php');
    exit;
}

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
    <title>Admin Panel</title>
    <link rel="stylesheet" href="/styling/styling.css">
</head>
<body>
<!-- aparte admin header in php -->
<?php include_once __DIR__ . '/header-admin.php'; ?>

<div class="content home">
    <div class="title">Admin Panel</div>

    <div class="content-box">
        <div class="general-text admin">
            <h2>Boeken Beheer</h2>
            <br>
            <a href="boek-toevoegen.php" class="add-btn">+ Nieuw Boek Toevoegen</a>

            <table>
                <thead>
                <tr>
                    <th>Titel</th>
                    <th>Auteur</th>
                    <th>ISBN</th>
                    <th>Acties</th>
                </tr>
                </thead>
                <tbody>

                <!-- zet alle opgehaalde boeken om naar boek -->
                <?php foreach ($boeken as $boek): ?>
                    <tr>
                        <!-- zet alles neer in een tabel -->
                        <td><?php echo($boek['titel']) ?></td>
                        <td><?php echo($boek['auteur']) ?></td>
                        <td><?php echo($boek['isbn']) ?></td>
                        <td>
                            <!-- stuur door naar pagina bewerken -->
                            <a href="boek-bewerken.php?id=<?php echo $boek['id'] ?>">Bewerken</a>

                            <!-- of de knop verwijderen -->
                            <a href="boek-verwijderen.php?id=<?php echo $boek['id'] ?>"
                               class="delete-btn"
                               onclick="return confirm('Zeker weten?')">Verwijderen</a>
                        </td>
                    </tr>
                <!-- eindig for loop -->
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>