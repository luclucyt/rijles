<?php

include('../_database.php');

echo json_encode(addLesson());

function addLesson()
{
    global $db;

    if (!isset($_POST) || empty($_POST)) {
        return [
            "status" => 0,
            "data" => "Geen gegevens gevonden"
        ];
    }

    //check if all the values are set + correc
    $stuNaam = $_POST['stuName'] ?? "";
    $lessonDate = $_POST['lessonDate'] ?? "";
    $lessonStart = $_POST['lessonStart'] ?? "";
    $lessonEnd = $_POST["lessonEnd"] ?? "";
    $lessonNote = $_POST["lessonNote"] ?? "";
    $lessonTodo = $_POST["lessonTodo"] ?? "";

    if (empty($stuNaam)) {
        return [
            "status" => 0,
            "data" => "Geen studenten Naam ingevuld"
        ];
    }

    if (empty($lessonDate) || empty($lessonStart) || empty($lessonEnd)) {
        return [
            "status" => 0,
            "data" => "Geen les tijd/datum ingevult"
        ];
    }

    //check if the user exists
    $stuNaam = $db->cleanData($stuNaam);
    $sql = "SELECT * FROM users WHERE naam = '$stuNaam' LIMIT 1";
    $result = $db->query($sql);

    if ($result->num_rows == 0) {
        return [
            "status" => 0,
            "data" => "Geen studenten kunnen vinden, controleer de naam"
        ];
    }

    $row = $result->fetch_assoc();
    $lessonStuID = $row["userID"];

    //check if the lesson overlaps with another lesson of any user
    $sql = "SELECT * FROM `lessen` 
               WHERE (
                   ('$lessonDate' BETWEEN `datum` AND DATE_ADD(`datum`, INTERVAL 1 DAY))
                   AND (
                        ('$lessonStart' BETWEEN `startTijd` AND `eindTijd`)
                        OR ('$lessonEnd' BETWEEN `startTijd` AND `eindTijd`)
                        OR (`startTijd` BETWEEN '$lessonStart' AND '$lessonEnd')
                        OR (`eindTijd` BETWEEN '$lessonStart' AND '$lessonEnd')

                   )
                   OR (
                       `datum` = '$lessonDate'
                       AND ('$lessonStart' BETWEEN `startTijd` AND `eindTijd`)
                   )
               )
               LIMIT 1";

    $result = $db->query($sql);
    if ($result->num_rows > 0) {
        return [
            "status" => 0,
            "data" => "Deze les overlapt met een andere les"
        ];
    }

    //add the lessen
               $lessonID = $db->cleanData(random_bytes(8));
               $lessonStuID = $db->cleanData($lessonStuID);
               $lessonDate = $db->cleanData($lessonDate);
               $lessonStart = $db->cleanData($lessonStart);
               $lessonEnd = $db->cleanData($lessonEnd);
               $lessonNote = $db->cleanData($lessonNote);
               $lessonTodo = $db->cleanData($lessonTodo);

               $sql = "INSERT INTO `lessen`
     (`lesID`, `userID`, `datum`, `startTijd`, `eindTijd`, `notitie`, `todo`) 
    VALUES ('$lessonID', '$lessonStuID', '$lessonDate', '$lessonStart', '$lessonEnd', '$lessonNote', '$lessonNote') ";
               $result = $db->query($sql);

    if (!$result) {
        return [
            "status" => 0,
            "data" => "Er is iets fout gegaan met het toevoegen van de les"
        ];
    }

    //update the user lesson amount
               $sql = "UPDATE `users` SET `lessenGebruikt` = `lessenGebruikt` + 1 WHERE `userID` = '$lessonStuID'";
               $result = $db->query($sql);
    if (!$result) {
        return [
            "status" => 0,
            "data" => "Er is iets fout gegaan met het updaten van de lessen gebruikt"
        ];
    }
}
