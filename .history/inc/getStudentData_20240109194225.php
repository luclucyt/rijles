<?php

function getStudentData(): array
{

    $basicReturn

    if (!isset($_SESSION['userID']) || !isset($_GET['userid'])) {
        return [
            'studentID' => '-',
            'naam' => '-',
            'mail' => '-',
            'adres' => '-',
            'postcode' => '-',
            'lessenGebruikt' => '-',
            'aanStaandeles' => '-',
        ];
    }

    return [
        'studentID' => $_SESSION['userID'],
        'mail' => $_SESSION['mail']
    ];
}
