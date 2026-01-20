<?php
ob_start();
session_start();

if (!isset($_SESSION['toegang']) || $_SESSION['toegang'] !== true) {
    header('Location: login.php');
    exit;
}

require_once __DIR__ . '/../database/database.php';

// UPDATE
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sql = "UPDATE boeken SET titel = :titel, auteur = :auteur, isbn = :isbn, omschrijving = :omschrijving, status = :status WHERE id = :id";
    $stmt = $pdo->prepare($sql);
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

// OPHALEN
$id = $_GET['id'] ?? null;
$stmt = $pdo->prepare("SELECT * FROM boeken WHERE id = :id");
$stmt->execute([':id' => $id]);
$boek = $stmt->fetch();

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

<?php include_once __DIR__ . '/header-admin.php'; ?>

<div class="content home">
    <div class="title">Boek Bewerken</div>

    <div class="content-box">
        <div class="general-text">
            <form method="POST">
                <input type="hidden" name="id" value="<?= $boek['id'] ?>">

                <label>Titel:</label>
                <input type="text" name="titel" value="<?= $boek['titel'] ?>" required>

                <label>Auteur:</label>
                <input type="text" name="auteur" value="<?= $boek['auteur'] ?>" required>

                <label>ISBN:</label>
                <input type="text" name="isbn" value="<?= $boek['isbn'] ?>">

                <label>Status:</label>
                <select name="status">
                    <option value="Beschikbaar" <?= $boek['status'] == 'Beschikbaar' ? 'selected' : '' ?>>Beschikbaar
                    </option>
                    <option value="Uitgeleend" <?= $boek['status'] == 'Uitgeleend' ? 'selected' : '' ?>>Uitgeleend
                    </option>
                    <option value="Niet beschikbaar" <?= $boek['status'] == 'Niet beschikbaar' ? 'selected' : '' ?>>Niet
                        beschikbaar
                    </option>
                </select>

                <label>Omschrijving:</label>
                <textarea name="omschrijving" rows="5"><?= $boek['omschrijving'] ?></textarea>

                <button class="adminknop" type="submit">Wijzigingen Opslaan</button>
                <a href="admin-panel.php">Annuleren</a>
            </form>
        </div>
    </div>
</div>

<?php include_once __DIR__ . '/../public/components/footer.php'; ?>

</body>
</html>