<?php

include '_view.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les toevoegen</title>

    <link rel="stylesheet" href="CSS/docToevoegen.css">

    <script src="JS/docAddles.js"></script>
</head>

<body>
    <a href='doc.overzicht.php'>Terug</a>

    <form class='add-les-form'>
        <input type="text" name="user" placeholder="user"><br>
        <input type="text" name="date" placeholder="Datum"><br>
        <input type="text" name="time" placeholder="Tijd"><br>
        <input type="text" name="duration" placeholder="Duur"><br>
        <input type="text" name="note" placeholder="Notitie"><br>
        <input type="text" name="todo" placeholder="TODO"><br>

        <input type="submit" value="Toevoegen">
    </form>
</body>

</html>
