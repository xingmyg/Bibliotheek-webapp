<?php
// Controleer of er een zoekterm is
$zoekterm = $_GET['zoek'] ?? '';

if ($zoekterm == '') {
    echo "U hebt niets ingevoerd.";
    exit;
}

// Veilige weergave
$zoektermVeilig = htmlspecialchars($zoekterm);
echo "<h1>Resultaten voor: $zoektermVeilig</h1>";

$boeken = [];

$resultaten = [];

foreach ($boeken as $boek) {
    if (stripos($boek, $zoekterm) !== false) {
        $resultaten[] = $boek;
    }
}

if (empty($resultaten)) {
    echo "<p>Geen resultaten gevonden.</p>";
} else {
    echo "<ul>";
    foreach ($resultaten as $res) {
        echo "<li>" . htmlspecialchars($res) . "</li>";
    }
    echo "</ul>";
}
