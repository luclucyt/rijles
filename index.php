<?php

include '_database.php';
include 'inc/forceLogin.php';

var_dump($_SESSION);

if (!isset($_SESSION['userID'])) {
    header('Location: login.php');
    exit;
}

if ($_SESSION['isAdmin'] != 1) {
    header('Locatiom: stu.overzicht.php');
}

header('Location: doc.overzicht.php');
