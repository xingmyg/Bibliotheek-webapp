<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="/styling/styling.css">
</head>
<body>
<!-- header in php -->
<?php include_once __DIR__ . '/../public/components/header.php'; ?>
<div id="login">
    <div class="title">Login</div>
    <div class="login-container">
        <h1>Login</h1>
        <form method="post" action="login-check.php">
            <label>Gebruikersnaam</label>
            <input type="text" name="username" required>
            <label>Wachtwoord</label>
            <!-- type= password, zodat het niet zichtbaar is in de browser -->
            <input type="password" name="password" required>
            <button type="submit">Inloggen</button>
        </form>
    </div>
</div>
<!-- Footer in php -->
<?php include_once __DIR__ . '/../public/components/footer.php'; ?>
</body>
</html>
