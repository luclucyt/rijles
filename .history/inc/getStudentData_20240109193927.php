<?php

function getStudentData(): array
{
    if (!isset($_SESSION['userID'])) {
        return [
            'naam' => '-',
            'mail' => '-',
            'adres' => '-',
            'postcide' => '-',
            'naam' => '-',
            'naam' => '-',
        ]
    }
    return [
        'studentID' => $_SESSION['userID'],
        'mail' => $_SESSION['mail']
    ];
}
