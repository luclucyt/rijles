<?php

include '_view.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les toevoegen</title>

    <link rel="stylesheet" href="CSS/docToevoegen.css">

    <script src="JS/docAddles.js" defer></script>
</head>

<body>
    <a href='doc.overzicht.php' class='go-back'>
        Terug
    </a>

    <form class='add-les-form'>
        <div class='username-wrapper'>
            <label>Naam
                <input type="text" name="userName" placeholder="Naam" class='input' id='find-user'></label>
            <div class='result-wrapper'>
                <div class='result'>

                </div>
            </div>
        </div>


        <label>Datum
            <input type="date" name="date" placeholder="Datum" class='input lesson-date'></label>
        <label>Start tijd
            <input type="time" name="time" placeholder="start Tijd" class='input lesson-start'></label>
        <label>Eind tijd
            <input type="time" name="time" placeholder="Eind Tijd" class='input lesson-end'></label>
        <label>Notitie
            <input type="text" name="note" placeholder="Notitie" class='input lesson-note'></label>
        <label>TODO
            <input type="text" name="todo" placeholder="TODO" class='input lesson-todo'></label>

        <input type="button" value="Toevoegen" class='submit'>
    </form>
</body>

</html>
