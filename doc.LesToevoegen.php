<?php

include '_database.php';
include 'inc/forceLogin.php';

$userID = $_SESSION['userID'];
if ($_SESSION['isAdmin'] != 1) {
    header("Location: index.php");
    exit;
}

include 'view/doc.LesToevoegen.view.php';
