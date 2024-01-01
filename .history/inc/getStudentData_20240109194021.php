<?php

function getStudentData(): array
{
    if (!isset($_SESSION['userID'])) {
        return [
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
