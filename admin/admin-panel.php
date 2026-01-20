<?php
session_start();

if (!isset($_SESSION['toegang']) || $_SESSION['toegang'] !== true) {
    header('Location: login.php');
    exit;
}

require_once __DIR__ . '/../database/database.php';

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

<?php include_once __DIR__ . '/header-admin.php'; ?>

<div class="content home">
    <div class="title">Admin Panel</div>

    <div class="content-box">
        <div class="general-text" style="max-width: 900px; width: 100%;">
            <h2>Boeken Beheer</h2>
            <br>
            <a href="boek-toevoegen.php" style="color: lightgreen;">+ Nieuw Boek Toevoegen</a>

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
                <?php foreach ($boeken as $boek): ?>
                    <tr>
                        <td><?= ($boek['titel']) ?></td>
                        <td><?= ($boek['auteur']) ?></td>
                        <td><?= ($boek['isbn']) ?></td>
                        <td>
                            <a href="boek-bewerken.php?id=<?= $boek['id'] ?>">Bewerken</a>
                            <a href="boek-verwijderen.php?id=<?= $boek['id'] ?>"
                               onclick="return confirm('Zeker weten?')">Verwijderen</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>