<?php
    include '_database.php';

    include 'inc/forceLogin.php';

    $userID = $_SESSION['userID'];

    $sql = "SELECT * FROM users WHERE userID = '$userID'";
    $userResult = $db->query($sql);
    $user = mysqli_fetch_assoc($userResult);

    $sql = "SELECT * FROM lessen WHERE userID = '$userID' ORDER BY datum DESC";
    $lessonResult = $db->query($sql);

    $lessons = [];

    while ($row = mysqli_fetch_assoc($lessonResult)) {
        $lessons[] = $row;
    }

    include 'view/stu.overzicht.view.php'
?>
