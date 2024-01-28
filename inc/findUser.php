<?php

include '../_database.php';

$response = [
    'status' => 0,
    'data' => ["Geen gebruikers gevonden"]
];

if (!isset($_POST['username'])) {
    echo json_encode($response);
    exit;
}

echo json_encode(findUsers($_POST['username']));

function findUsers($username): array
{
    global $db;
    global $response;

    $username = $db->cleanData($username);
    $sql = "SELECT * FROM users WHERE naam LIKE '%$username%' AND isAdmin = 0 LIMIT 10";
    $result = $db->query($sql);

    if (!$result) {
        $response['data'] = mysqli_error($db->conn);
        return $response;
    }

    $response['status'] = 1;
    $response['data'] = [];

    while ($row = $result->fetch_assoc()) {
        $response['data'][] = $row['naam'];
    }


    return $response;
}
