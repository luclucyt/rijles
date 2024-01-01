<?php

function getStudentData(): array
{
    if (!isset($_SESSION['userID'])) {
        return [
            'student'
        ]
    }
    return [
        'studentID' => $_SESSION['userID'],
        'mail' => $_SESSION['mail']
    ];
}
