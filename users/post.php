<?php

include '../conn.php';

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //input
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    //sql
    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
    $query = mysqli_query(connection(), $sql);

    //response
    $response['status']['success'] = true;
    $response['status']['code'] = 200;
    $response['data'] = $_POST;

    $data = json_encode($response);
    echo $data;
}