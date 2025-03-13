<?php

include 'conn.php';

header("Content-type: application/json");

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // sql
    $sql = "SELECT * FROM users";
    $query = mysqli_query(connection(), $sql);

    // output
    $result = [];
    $result['status']['success'] = true;
    $result['status']['code'] = 200;
    $result['data'] = array();

    while ($data = mysqli_fetch_assoc($query)) {
        array_push($result['data'], $data);
    }

    // response
    $response = json_encode($result);
    echo $response;
}