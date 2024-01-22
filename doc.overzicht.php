<?php

include '_database.php';
include 'inc/forceLogin.php';

$userID = $_SESSION['userID'];
if ($_SESSION['isAdmin'] != 1) {
    header("Location: index.php");
    exit;
}

$today = date("Y-m-d");

//calculate the week offset
if (isset($_GET['week'])) {
    $_SESSION['week_offset'] = $_GET['week'];
} else {
    $_SESSION['week_offset'] = 0;
}

if (!isset($_SESSION['week_offset'])) {
    $_SESSION['week_offset'] = 0;
}

//format the week offset correctly
if ($_SESSION['week_offset'] < 0) {
    $offset = $_SESSION['week_offset'];
} else {
    $offset = "+ " . $_SESSION['week_offset'];
}

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

function formatDate($date, $format = 'D j M')
{
    global $dayTranslations, $monthTranslations, $offset, $today;

    $formatedDate = date($format, strtotime($date . 'this week', strtotime($today)) + strtotime($offset . ' week', 0));
    $formatedDate = strtr($formatedDate, $dayTranslations);
    $formatedDate = strtr($formatedDate, $monthTranslations);

    return $formatedDate;
}

$startOfWeek = formatDate('monday', 'Y-m-d');
$endOfWeek = formatDate('sunday', 'Y-m-d');

$sql = "SELECT * FROM `lessen` WHERE `datum` BETWEEN '$startOfWeek' and '$endOfWeek' ORDER BY `datum` ASC";
$result = $db->query($sql);

$lessons = array();

while ($row = mysqli_fetch_assoc($result)) {
    //format the array to be used in the grid
    $row['colum'] = date("N", strtotime($row['datum'])) - 1;

    $startTijd = $row['startTijd'];
    $eindTijd = $row['eindTijd'];

    $startTijdArray = explode(":", $startTijd);
    $eindTijdArray = explode(":", $eindTijd);

    $startTijdArray[0] = $startTijdArray[0] * 2;
    $eindTijdArray[0] = $eindTijdArray[0] * 2;

    if ($startTijdArray[1] === "30") {
        $startTijdArray[0] = $startTijdArray[0] + 1;
    }

    if ($eindTijdArray[1] == "30") {
        $eindTijdArray[0] = $eindTijdArray[0] + 1;
    }

    $row['startRow'] = $startTijdArray[0];
    $row['endRow'] = $eindTijdArray[0];


    $sql = "SELECT * FROM users WHERE userID = '" . $row['userID'] . "'";
    $result2 = $db->query($sql);

    if (!$result2) {
        die("Error: " . $sql . "<br>" . mysqli_error($db->conn));
    }
    $row2 = mysqli_fetch_assoc($result2);

    $row['naam'] = $row2['naam'];

    $lessons[] = $row;
}
$today = date("Y-m-d");


$monday = formatDate('monday');
$tuesday = formatDate('tuesday');
$wednesday = formatDate('wednesday');
$thursday = formatDate('thursday');
$friday = formatDate('friday');
$saturday = formatDate('saturday');
$sunday = formatDate('sunday');
$week = array($monday, $tuesday, $wednesday, $thursday, $friday, $saturday, $sunday);

$today = date("D j M", strtotime($today));
$today = strtr($today, $dayTranslations + $monthTranslations);

include 'view/doc.overzicht.view.php';
