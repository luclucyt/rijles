<?php

include '../_database.php';

echo json_encode(getData());

function getData(): array
{
    global $db;

    $basicReturn = [
        'datum'     =>   "-",
        'startTijd' =>   "-",
        'eindTijd'  =>   "-",
        'docent'    =>   "-",
        'todo'      =>   "-",
        'note'      =>   "-",
        'student'   =>   '-',
        'adres'     =>   '-'
    ];

    if (!isset($_POST['lesID'])) {
        return $basicReturn;
    }


    $lesID = $_POST['lesID'];
    $lesID = $db->cleanData($lesID);

    $sql = "SELECT * FROM lessen WHERE lesID = '$lesID'";
    $result = $db->query($sql);

    if (mysqli_num_rows($result) == 0) {
        return $basicReturn;
    }

    $row = mysqli_fetch_assoc($result);
    $userID = $row['userID'];

    $sql = "SELECT * FROM users WHERE userID = '$userID'";
    $result = $db->query($sql);

    if (!$result) {
        echo "Error: " . $sql . "<br>" . mysqli_error($db->conn);
        return $basicReturn;
    }

    $studentRow = mysqli_fetch_assoc($result);
    $student = $studentRow["naam"];
    $adres =  $studentRow["adres"];



    return[
        'datum'     =>   $row['datum'],
        'startTijd' =>   $row['startTijd'],
        'eindTijd'  =>   $row['eindTijd'],
        'docent'    =>   "Alvindo Den Os",
        'todo'      =>   $row['todo'],
        'note'      =>   $row['notitie'],
        'student'   =>   $student,
        'adres'     =>   $adres
    ];
}
