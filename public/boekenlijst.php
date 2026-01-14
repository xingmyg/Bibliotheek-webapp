<?php
// database.php
$host = "db";
$port = 3306;
$dbname = "bibliotheek";
$user = "biblio";
$password = "secret";

try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Verbinding mislukt: " . $e->getMessage());
}

// Zoekfunctionaliteit
$zoek = '';
if (isset($_GET['zoek'])) {
    $zoek = $_GET['zoek'];
}

$sql = "SELECT * FROM Boekenlijst";
if ($zoek != '') {
    $sql .= " WHERE Titel LIKE :zoek OR Auteur LIKE :zoek";
}

$stmt = $pdo->prepare($sql);

if ($zoek != '') {
    $stmt->bindValue(':zoek', '%' . $zoek . '%');
}

$stmt->execute();
$boeken = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Boekenlijst</title>
</head>
<body>

<h1>Boekenlijst</h1>

<form method="get">
    <input type="text" name="zoek" placeholder="Zoek boek" value="<?php echo($zoek); ?>">
    <button type="submit">Zoek</button>
</form>

<ul class="boekenlijst">
    <?php
    if (count($boeken) == 0) {
        echo '<li>Geen boeken gevonden</li>';
    } else {
        foreach ($boeken as $boek) {
            echo '<li>';
            echo '<strong>' . ($boek['Titel']) . '</strong><br>';
            echo 'Auteur: ' . ($boek['Auteur']) . '<br>';
            echo 'ISBN: ' . ($boek['ISBN']) . '<br>';
            echo 'Status: ' . ($boek['Beschikbaarheid']);
            echo '</li>';
        }
    }
    ?>
</ul>

</body>
</html>
