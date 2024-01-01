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

    <h1 class="welkom-text">Welkom <?= $_SESSION['name'] ?>,</h1>

    <main>
        <section class="user-wrapper">
            <div class="studenten-search">
                <input type="text" placeholder="Zoek studenten" id="search">
            </div>
            <div class="studenten-list">
                <?php foreach ($students as $student) : ?>
                <div class="student-wrapper" data-userID="<?= $student['userID'] ?>">
                    <div class="studenten-naam"><?= $student['naam'] ?> </div><br>
                </div>
                <?php endforeach; ?>
            </div>
        </section>

        <section class="detail-wrapper">
            <div class="studenten-info">
                <div class="detail-content-left"></div>
                <div class="detail-content-right"></div>

                <div class="info-contact">
                    <div class="studenten-info-email"></div>
                    <div class="studenten-info-telefoon"></div>
                </div>

                <div class="info-location">
                    <div class="studenten-info-adres"></div>
                    <div class="studenten-info-postcode"></div>

                </div>
                <div class="studenten-info-naam"></div>
                <div class="studenten-info-lessengebruikt"></div>
                <div class="studenten-info-aanstaandeles"></div>
            </div>

            <div class="detail-close">
                <div class="close-background"></div>
                <span class="close1"></span>
                <span class="close2"></span>
            </div>
        </section>
    </main>

</body>

</html>
