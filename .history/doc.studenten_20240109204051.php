<?php

include '_database.php';
include 'inc/forceLogin.php';
$userID = $_SESSION['userID'];
if ($_SESSION['isAdmin'] != 1) {
    header("Location: index.php");
}

$result = $db->query("SELECT * FROM users WHERE isGeslaagd = 0");
$students = [];
while ($row = mysqli_fetch_assoc($result)) {
    $students[] = $row;
}

include 'view/doc.studenten.view.php';