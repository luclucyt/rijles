<?php

function getStudentData(): array
{

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

    return [
        'studentID' => $_SESSION['userID'],
        'mail' => $_SESSION['mail']
    ];
}
