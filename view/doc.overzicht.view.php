<?php include '_view.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Lessen</title>

    <link rel="stylesheet" href="CSS/doc.header.css">
    <link rel="stylesheet" href="CSS/doc.overzicht.css">

    <script src="JS/docOverzicht.js" defer></script>

    <link rel="icon" href="IMG/favicon.png">
</head>

<body>
    <!-- <header>
        <ul class="header-list">
            <li class='header-item'><a href='doc.studenten.php'>Studenten</a></li>
            <li class='header-item'><a href='doc.overzicht.php'>Agenda</a></li>
        </ul>
    </header> -->
    <section class="agenda-wrapper">
        <div class="header">
            <div class="last-week week-manager">
                <a href="doc.overzicht.php?week=<?= $_SESSION['week_offset'] - 1 ?>">
                    <
                        </a>
            </div>

            <div class='day-wrapper'>
                <?php foreach ($week as $day) : ?>
                <?php if ($day == $today) : ?>
                <div class="day today">
                    <p>
                        <?= $day; ?>
                    </p>
                </div>
                <?php else : ?>
                <div class="day">
                    <p>
                        <?= $day; ?>
                    </p>
                </div>
                <?php endif; ?>
                <?php endforeach; ?>
            </div>
            <div class="next-week week-manager">
                <a href="doc.overzicht.php?week=<?= $_SESSION['week_offset'] + 1 ?>">
                    >
                </a>
            </div>

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
                    <?php foreach ($lessons as $lesson) : ?>
                    <div
                        class="lesson grid-item"
                        style=" grid-column: <?= $lesson['colum'] + 1 ?> ;
                                grid-row-start: <?= $lesson['startRow'] + 1?> ;
                                grid-row-end: <?= $lesson['endRow'] + 1 ?>;"
                        data-id="<?= $lesson['lesID'] ?>">
                        <p>
                            <?= $lesson['naam']; ?>
                        </p>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
    </section>

    <section class="detail-wrapper">
        <h1 class="detail-student">Naam Stu</h1>


        <div class="detail-content-wrapper">
            <div class="detail-content-left">
                <div class="detail-time">
                    <p class="detail-startTijd">19:00</p>
                    <p class="detail-eindTijd">20:00</p>
                </div>

                <div class="detail-instructeur-wrapper">
                    <p class="detail-adres">adres</p>
                </div>
            </div>


            <div class="detail-content-right">
                <div class="detail-opmerking">
                    <p>Notitie:</p>
                    <p class="opmerking-content">q</p>
                </div>
                <div class="detail-todo">
                    <p>TODO:</p>
                    <p class="todo-content">q</p>
                </div>
            </div>
        </div>

        <div class="detail-close">
            <div class="close-background"></div>
            <span class="close1"></span>
            <span class="close2"></span>
        </div>
    </section>

    <div class="plus-wrapper">
        +
    </div>

</body>

</html>