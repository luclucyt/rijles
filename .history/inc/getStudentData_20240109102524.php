<?php

echo json_encode(getStudentData());

function getStudentData(): array
{
    return [
        'studentID' => $_SESSION['userID'],
        'mail' => $_SESSION['mail']
    ];
}
