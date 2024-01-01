<?php

echo json_encode(getStudentData());

function getStudentData()
{
    return [
        'studentID' => $_SESSION['userID'],
        'mail' => $_SESSION['mail']
    ];
}
