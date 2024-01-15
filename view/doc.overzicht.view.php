<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Lessen</title>

    <link rel="stylesheet" href="CSS/doc.overzicht.css">

    <link rel="icon" href="IMG/favicon.png">
</head>

<body>
    <section class="agenda-wrapper">
        <div class="header">
            <div class="last-week">
                <a href="doc.overzicht.php?week=<?= $_SESSION['week_offset'] - 1 ?>">
                    <img src="IMG/arrow-left.svg" alt="Vorige week">
                </a>
            </div>
            <?php foreach ($week as $day) : ?>
            <div class="day">
                <p><?= $day ?></p>
            </div>
            <?php endforeach; ?>

            <div class="next-week">
                <a href="doc.overzicht.php?week=<?= $_SESSION['week_offset'] + 1 ?>">
                    <img src="IMG/arrow-right.svg" alt="Volgende week">
                </a>
            </div>
            <div class="grid-container">
                <div class="lines">

                    <div class="hour-line-wrapper">
                        <?php for ($i = 1; $i < 24; $i++) : ?>
                        <div class="hour-line">
                            <p><?= $i ?>:00</p>
                        </div>
                        <?php endfor; ?>
                    </div>

                    <div class="day-line-wrapper">
                        <div class="day-line"></div>
                        <div class="day-line"></div>
                        <div class="day-line"></div>
                        <div class="day-line"></div>
                        <div class="day-line"></div>
                        <div class="day-line"></div>
                        <div class="day-line"></div>
                    </div>
                    <div class="grid">
                        <div class="grid-item"></div>
                    </div>
                </div>
            </div>
    </section>

    <div class="plus-wrapper">
        +
    </div>

</body>

</html>
