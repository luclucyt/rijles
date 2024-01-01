<?php

include("../_database.php");

echo json_encode(getStudentData());

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

    //get the user data (and the last lesson (lessen))
    $sql = "SELECT * FROM users WHERE userID = '$userID' INNER JOIN lessen ON lessen.userID = users.userID ORDER BY lessenID DESC LIMIT 1";

    // $sql = "SELECT * FROM users WHERE userID = '$userID'";
    $result = $db->query($sql);

    if (!$result) {
        return $basicReturn;
    }

    $row = mysqli_fetch_assoc($result);
    return [
        'studentID' => $row['userID'],
        'naam' => $row['naam'],
        'mail' => $row['mail'],
        'adres' => $row['adres'],
        'postcode' => $row['postcode'],
        'lessenGebruikt' => $row['lessenGebruikt']
        'aanStaandeles' => $row['aanStaandeles']
    ];
}
