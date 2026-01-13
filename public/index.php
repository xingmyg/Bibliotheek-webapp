<?php
// database.php
$host = "db";
$port = 3306;
$dbname = "bibliotheek";
$user = "biblio";
$password = "secret";

$conn = new mysqli($host, $user, $password, $dbname, $port);

// Check verbinding
if ($conn->connect_error) {
    die("Verbinding mislukt: " . $conn->connect_error);
}

// Verbinding gelukt
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styling/styling.css">
    <title>Home pagina - De Boekenreus</title>
</head>

<body>
<!-- Header in php -->
<?php require_once __DIR__ . '/../includes/header.php'; ?>
<div class="content">
    <div class="title">Home</div>
    <div class=content-box>
        <div class="photos">
            <img class=photo src="images/bieb-home2.png" alt="Bibliotheek fotos">
        </div>
        <div id="general-text">
            <strong>
                <h2>Bibliotheek "De Boekenreus"</h2>
            </strong>
            <p>Bij De Boekenreus draait alles om de magie van verhalen.</p>
            <p>Of je nu komt om te lezen, te leren of om ons cafe te bezoeken,</p>
            <p>onze deuren staan open voor iedereen.</p>

            <p>Ontdek een wereld vol boeken, tijdschriften en digitale media,</p>
            <p>vind jouw volgende favoriete verhaal of laat je inspireren door onze activiteiten en workshops.</p>

            <p>Wij geloven dat lezen verbindt, verrijkt en verbeelding voedt.</p>
            <p>Dus stap binnen, neem de tijd en laat je meenemen op reis tussen de bladzijden.</p>

            <p>De Boekenreus, waar elk boek een avontuur is!</p>
        </div>
        <!-- verander de foto's -->
        <div class="photos">
            <img class=photo src="images/bieb-home1.png" alt="Bibliotheek fotos">
        </div>
    </div>
</div>
<!-- footer in php -->
<?php require_once __DIR__ . '/../includes/footer.php'; ?>
</body>
</html>