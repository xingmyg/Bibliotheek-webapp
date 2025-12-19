<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styling/styling.css">
    <title>Home pagina - De Boekenreus</title>
</head>

<body>
    <!-- Header in php -->
    <nav>
        <?php include 'header.php'; ?>
    </nav>
    <div class="content">
        <div class="title">Home</div>
        <div class=content-box index> 
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
        </div>
        <div class="photos">
            <div class="home"></div>
            <img class=photo src="photos" alt="Bibliotheek fotos">
            <div class="home"></div>
            <img class=photo src="photos" alt="Bibliotheek fotos">
        </div>
    </div>
    <!-- footer in php -->
    <?php include 'footer.php'; ?>
</body>

</html>