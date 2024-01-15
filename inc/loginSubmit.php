<?php

include '../_database.php';

echo json_encode(login());

function login(): array
{
    global $db;

    if (!isset($_POST['mail']) || !isset($_POST['password'])) {
        return [0, 'Vul alle velden in'];
    }

    if (empty($_POST['mail']) || empty($_POST['password'])) {
        return [0, 'Vul alle velden in'];
    }

    $mail = $_POST['mail'];
    $password = $_POST['password'];

    $mail = $db->cleanData($mail);
    $password = $db->cleanData($password);

    $sql = "SELECT * FROM users WHERE mail = '$mail'";
    $result = $db->query($sql);


    if (mysqli_num_rows($result) == 0) {
        return [0, 'E-mailadres of wachtwoord is onjuist'];
    }

    $row = mysqli_fetch_assoc($result);

    if (!password_verify($password, $row['password'])) {
        return [0, 'E-mailadres of wachtwoord is onjuist'];
    }

    $_SESSION['loggedIn'] = true;
    $userID = $_SESSION['userID'] = $row['userID'];
    $mail = $_SESSION['mail'] = $row['mail'];
    $isAdmin = $_SESSION['isAdmin'] = $row['isAdmin'];
    $naam = $_SESSION['name'] = $row['naam'];

    return [1, 'Je bent ingeloged', $userID];
}
