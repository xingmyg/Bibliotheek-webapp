<?php
session_start();
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <title>Contact</title>
    <link rel="stylesheet" href="/styling/styling.css">
</head>
<body>

<?php require_once __DIR__ . '/components/header.php'; ?>
<div class="content home">
    <div class="title">Home</div>
    <div class=content-box>
        <div class="general-text">
            <h3>Adresgegevens</h3>
            <p class="dikgedrukt">De Centrale Bibliotheek</p>
            <p>Boekenlaan 123</p>
            <p>1234 AB Leesstad</p>
            <br>
            <p>telefoonnummer:020 - 123 45 67</p>
            <p>mailadres: info@bibliotheek.nl</p>
        </div>
        <div class="general-text">
            <h3>Openingstijden</h3>
            <p><strong>Maandag:</strong> 13:00 - 17:30</p>
            <p><strong>Dinsdag:</strong> 09:00 - 17:30</p>
            <p><strong>Woensdag:</strong> 09:00 - 17:30</p>
            <p><strong>Donderdag:</strong> 09:00 - 20:00 (Koopavond)</p>
            <p><strong>Vrijdag:</strong> 09:00 - 17:30</p>
            <p><strong>Zaterdag:</strong> 10:00 - 16:00</p>
            <p><strong>Zondag:</strong> Gesloten</p>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/components/footer.php'; ?>

</body>
</html>
