<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="/styling/styling.css">
</head>
<body>
<div class="login-container">
    <h1>Login</h1>
    <form method="post" action="login-check.php">
        <label>Gebruikersnaam</label>
        <input type="text" name="username" required>
        <label>Wachtwoord</label>
        <input type="password" name="password" required>
        <button type="submit">Inloggen</button>
    </form>
</div>
</body>
</html>
