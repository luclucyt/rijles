<?php

include("../_database.php");

function getStudentData(): array
{
    global $db;

    $basicReturn = [
        'studentID' => '-',
        'naam' => '-',
        'mail' => '-',
        'adres' => '-',
        'postcode' => '-',
        'lessenGebruikt' => '-',
        'aanStaandeles' => '-',
    ];

    if (!isset($_SESSION['userID']) || !isset($_GET['userid'])) {
        return $basicReturn;
    }

    $userID = $_GET['userid'];
    $userID = $db->cleanData($userID);

    $sql = "SELECT * FROM users WHERE userID = '$userID'";
    $result = $db->query($sql);

    if (!$result) {
        return $basicReturn;
    }

    return [
        'studentID' => $_SESSION['userID'],
        'mail' => $_SESSION['mail']
    ];
}
