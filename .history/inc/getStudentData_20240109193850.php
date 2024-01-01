<?php

function getStudentData(): array
{
    if (!isset($_SESSION['userID'])) {
        return [
            'naam' => ""
        ]
    }
    return [
        'studentID' => $_SESSION['userID'],
        'mail' => $_SESSION['mail']
    ];
}
