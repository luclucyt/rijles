<?php

include '../_database.php';

echo json_encode(getData());

function getData() : array{
    global $db;

    $basicReturn = [
        'datum'     =>   "-",
        'startTijd' =>   "-", 
        'eindTijd'  =>   "-", 
        'docent'    =>   "-", 
        'todo'   =>   "-", 
        'note'      =>   "-"
    ];

    if(!isset($_POST['lesID'])){
        return $basicReturn;
    }

    $lesID = $_POST['lesID'];
    $lesID = $db->cleanData($lesID);

    $sql = "SELECT * FROM lessen WHERE lesID = '$lesID'";
    $result = $db->query($sql);

    if(mysqli_num_rows($result) == 0){
        return $basicReturn;            
    }

    $row = mysqli_fetch_assoc($result);


    return[
        'datum'     =>   $row['datum'],
        'startTijd' =>   $row['startTijd'], 
        'eindTijd'  =>   $row['eindTijd'],
        'docent'    =>   "Alvindo Den Os",
        'todo'      =>   $row['todo'], 
        'note'      =>   $row['notitie']
    ];
}