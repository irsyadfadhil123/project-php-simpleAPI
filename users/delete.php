<?php

include '../conn.php';

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
    //input
    $id = $_GET["id"];

    //sql
    $sql = "DELETE FROM users WHERE id=$id";
    $query = mysqli_query(connection(), $sql);

    //response
    $response['status']['success'] = true;
    $response['status']['code'] = 200;
    $response['data'] = array();

    $data = json_encode($response);
    echo $data;
}