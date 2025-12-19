<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styling/styling.css">
    <title> Boekenlijst - De Boekenreus</title>
</head>

<body>
    <!-- Header in php -->
    <nav>
        <?php include 'header.php'; ?>
    </nav>
    <div class="content">
        <div class="title">Boekenlijst</div>
        <div class=content-box lijst>
            <div class="category">
                <!-- verander de foto's -->
                <div class="category-title">Fantasy</div>
                <img class=photo src="photos" alt="Boek fotos">
                <img class=photo src="photos" alt="Boek fotos">
                <img class=photo src="photos" alt="Boek fotos">
                <img class=photo src="photos" alt="Boek fotos">
                <img class=photo src="photos" alt="Boek fotos">
            </div>
            <div class="category">
                <div class="category-title">Jeugd</div>
                <img class=photo src="photos" alt="Boek fotos">
                <img class=photo src="photos" alt="Boek fotos">
                <img class=photo src="photos" alt="Boek fotos">
                <img class=photo src="photos" alt="Boek fotos">
                <img class=photo src="photos" alt="Boek fotos">
            </div>
            <div class="category">
                <div class="category-title">Romantic</div>
                <img class=photo src="photos" alt="Boek fotos">
                <img class=photo src="photos" alt="Boek fotos">
                <img class=photo src="photos" alt="Boek fotos">
                <img class=photo src="photos" alt="Boek fotos">
                <img class=photo src="photos" alt="Boek fotos">
            </div>
        </div>
    </div>
    <!-- footer in php -->
    <?php include 'footer.php'; ?>
</body>

</html>