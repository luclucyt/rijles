<?php

include '_database.php';

include 'inc/forceLogin.php';

if (!isset($_SESSION['userID'])) {
    header('Location: login.php');
    exit;
}

if ($_SESSION['isAdmin'] == 0) {
    echo '<script>window.location.href = "https://88875.stu.sd-lab.nl/rijles/stu.overzicht.php"</script>';
} else {
    echo '<script>window.location.href = "https://88875.stu.sd-lab.nl/rijles/doc.overzicht.php"</script>';
}
