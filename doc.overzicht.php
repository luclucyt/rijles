<?php

include '_database.php';
include 'inc/forceLogin.php';

$userID = $_SESSION['userID'];
if ($_SESSION['isAdmin'] != 1) {
    header("Location: index.php");
}


//get the start date of the week (monday) through the end date of the week (sunday)
//and put them in a array
$today = date("Y-m-d");

if (isset($_GET['week'])) {
    $_SESSION['week_offset'] = $_GET['week'];
} else {
    $_SESSION['week_offset'] = 0;
}

if (!isset($_SESSION['week_offset'])) {
    $_SESSION['week_offset'] = 0;
}

if ($_SESSION['week_offset'] < 0) {
    $offset = $_SESSION['week_offset'];
} else {
    $offset = "+ " . $_SESSION['week_offset'];
}

$monday = date("D j M", strtotime('monday this week', strtotime($today)) + strtotime($offset . ' week', 0));
$tuesday = date("D j M", strtotime('tuesday this week', strtotime($today)) + strtotime($offset . ' week', 0));
$wednesday = date("D j M", strtotime('wednesday this week', strtotime($today)) + strtotime($offset . ' week', 0));
$thursday = date("D j M", strtotime('thursday this week', strtotime($today)) + strtotime($offset . ' week', 0));
$friday = date("D j M", strtotime('friday this week', strtotime($today)) + strtotime($offset . ' week', 0));
$saturday = date("D j M", strtotime('saturday this week', strtotime($today)) + strtotime($offset . ' week', 0));
$sunday = date("D j M", strtotime('sunday this week', strtotime($today)) + strtotime($offset . ' week', 0));

$today = date("D j M", strtotime($today));

// Dutch translations
$dayTranslations = array(
    'Mon' => 'Ma',
    'Tue' => 'Di',
    'Wed' => 'Wo',
    'Thu' => 'Do',
    'Fri' => 'Vr',
    'Sat' => 'Za',
    'Sun' => 'Zo',
);

$monthTranslations = array(
    'Jan' => 'Jan',
    'Feb' => 'Feb',
    'Mar' => 'Mrt',
    'Apr' => 'Apr',
    'May' => 'Mei',
    'Jun' => 'Jun',
    'Jul' => 'Jul',
    'Aug' => 'Aug',
    'Sep' => 'Sep',
    'Oct' => 'Okt',
    'Nov' => 'Nov',
    'Dec' => 'Dec',
);

$monday = strtr($monday, $dayTranslations);
$tuesday = strtr($tuesday, $dayTranslations);
$wednesday = strtr($wednesday, $dayTranslations);
$thursday = strtr($thursday, $dayTranslations);
$friday = strtr($friday, $dayTranslations);
$saturday = strtr($saturday, $dayTranslations);
$sunday = strtr($sunday, $dayTranslations);

$today = strtr($today, $dayTranslations);

$monday = strtr($monday, $monthTranslations);
$tuesday = strtr($tuesday, $monthTranslations);
$wednesday = strtr($wednesday, $monthTranslations);
$thursday = strtr($thursday, $monthTranslations);
$friday = strtr($friday, $monthTranslations);
$saturday = strtr($saturday, $monthTranslations);
$sunday = strtr($sunday, $monthTranslations);

$today = strtr($today, $monthTranslations);

$week = array($monday, $tuesday, $wednesday, $thursday, $friday, $saturday, $sunday);



include 'view/doc.overzicht.view.php';
