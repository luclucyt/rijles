<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>vind studenten</title>

    <link rel="stylesheet" href="CSS/doc.studenten.css">

    <script src="JS/docStudenten.js" defer></script>

    <link rel="icon" href="IMG/favicon.png">

</head>

<body>

    <main>
        <div class="studenten-search">
            <input type="text" placeholder="Zoek studenten" id="search">
        </div>
        <div class="studenten-list">
            <?php foreach ($students as $student) { ?>
            <div class="student-wrapper" data-userID="<?= $student['userID'] ?>">
                <div class="studenten-naam"><?= $student['naam'] ?> </div><br>
            </div>
            <?php } ?>
        </div>

        <div class="studenten-info">
            <div class="studenten-info-naam"></div>
            <div class="studenten-info-email"></div>
            <div class="studenten-info-adres"></div>
            <div class="studenten-info-postcode"></div>
            <div class="studenten-info-telefoon"></div>
            <div class="studenten-info-lessengebruikt"></div>
            <div class="studenten-info-aanstaandeles"></div>
        </div>
    </main>

</body>

</html>
