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
<?php include_once __DIR__ . '/components/header.php'; ?>
<div class="content home">
    <div class="title">Home</div>
    <div class=content-box>
        <div class="photos">
            <img class=photo src="images/bieb-home2.png" alt="Bibliotheek fotos">
        </div>
        <div class="general-text">
            <h2>Bibliotheek "De Boekenreus"</h2>
            <p>
                Bij De Boekenreus draait alles om de magie van verhalen. Of je nu komt om te lezen, te leren, of om ons
                gezellige café te bezoeken, onze deuren staan open voor iedereen die nieuwsgierig is en van boeken
                houdt.
            </p>
            <p>
                Ontdek een wereld vol boeken, tijdschriften, e-books en digitale media. Vind jouw volgende favoriete
                verhaal, laat je inspireren door onze activiteiten, of geniet van de rust en sfeer in onze
                leeshoeken.
            </p>
            <p>
                Wij geloven dat lezen verbindt, verrijkt en de verbeelding voedt. Het opent deuren naar nieuwe
                werelden, geeft ontspanning en stimuleert creativiteit.<br>Of je nu jong bent of oud, fervent lezer of
                nieuwsgierige bezoeker, bij De Boekenreus is er voor ieder wat wils.</br>
            </p>
        </div>
        <div class="general-text evenementen">
            <h2>Leuke evenementen die eraan komen!</h2>
            <ul>
                <li><strong>Kinderboekendag:</strong> Zaterdag 20 januari – Kom verkleed als je favoriete
                    verhaalpersonage en geniet van voorleessessies en knutselactiviteiten.
                </li>
                <li><strong>Schrijversworkshop voor volwassenen:</strong> Woensdag 24 januari – Leer de fijne kneepjes
                    van het schrijven van verhalen en poëzie, begeleid door een lokale auteur.
                </li>
                <li><strong>Boek & Koffie:</strong> Vrijdag 26 januari – Ontmoet andere boekenliefhebbers tijdens een
                    gezellige avond met boekentips, koffie en gebak.
                </li>
                <li><strong>Young Adult Leestafel:</strong> Zaterdag 27 januari – Een interactieve leesclub voor tieners
                    met discussies over de populairste YA-boeken van dit moment.
                </li>
                <li><strong>Digitale Media Workshop:</strong> Maandag 29 januari – Leer hoe je e-books en audioboeken
                    optimaal kunt gebruiken.
                </li>
            </ul>
        </div>
        <!-- verander de foto's -->
        <div class="photos">
            <img class=photo src="images/bieb-home1.png" alt="Bibliotheek fotos">
        </div>
    </div>
</div>
<!-- footer in php -->
<?php include_once __DIR__ . '/components/footer.php'; ?>
</body>
</html>