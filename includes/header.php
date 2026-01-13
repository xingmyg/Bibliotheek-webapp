<?php
// database.php
$host = "db";
$port = 3306;
$dbname = "bibliotheek";
$user = "biblio";
$password = "secret";

// Maak verbinding met MySQL
$conn = new mysqli($host, $user, $password, $dbname, $port);

// Check verbinding
if ($conn->connect_error) {
    die("Verbinding mislukt: " . $conn->connect_error);
}

// Verbinding gelukt
?>

<!-- html van de header -->
<nav>
    <a href="index.php">Home</a>
    <a href="boekenlijst.php">Boekenlijst</a>
    <a href="over-ons.php">Over ons</a>
    <form class="nav-search" action="zoeken.php" method="get">
        <input type="search" name="zoek" placeholder="Zoeken">
        <button type="submit">Zoek</button>
</nav>