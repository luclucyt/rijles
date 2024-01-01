<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="CSS/login.css">

    <script src="JS/login.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="icon" href="IMG/favicon.png">
</head>
<body>
    <main>
        <form>
            <h1 class="header">Login:</h1>
            <input type="mail" name="mail" id="login-mail" placeholder="E-mail"><br>
            
            <input type="password" name="password" id="login-password" placeholder="Password"><br>
            <a href="wachtwoord-vergeten.php">Wachtwoord vergeten?</a><br>
            <p id="login-error"> </p>

            <button type="button" id="login-submit">Login</button>
        </form>
    </main>
</body>
</html>