<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>overzicht</title>

    <link rel="stylesheet" href="CSS/stu.overzicht.css">

    <script src="JS/stuOverzicht.js" defer></script>

    <link rel="icon" href="IMG/favicon.png">

</head>

<body>
    <h1 class="welkom-text">Welkom <?= $_SESSION['name'] ?>,</h1>


    <main>

        <section class="lessen-wrapper">
            <?php foreach ($lessons as $les) : ?>
            <div class="les-wrapper" data-lesID="<?= $les['lesID'] ?>">
                <h2><?= $les['datum'] ?></h2>
                <h3><?= $les['startTijd'] ?> - <?= $les['eindTijd'] ?></h3>
            </div>
            <?php endforeach; ?>
        </section>

        <section class="detail-wrapper">
            <h1 class="detail-datum">23-12-2023</h1>


            <div class="detail-content-wrapper">
                <div class="detail-content-left">
                    <div class="detail-time">
                        <p class="detail-startTijd">19:00</p>
                        <p class="detail-eindTijd">20:00</p>
                    </div>

                    <div class="detail-instructeur-wrapper">
                        <img src="img/instructeur.jpg" alt="instructeur" class="detail-instructeur-img">
                        <p class="detail-instructeur">Alvindo Den Os</p>
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

    </main>

    <div class="spinner-background">
        <div class="spinner">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

</body>

</html>
