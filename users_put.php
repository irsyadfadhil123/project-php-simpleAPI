<?php

include('conn.php');

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "PUT") {
    //input
    parse_str(file_get_contents('php://input'), $_PUT);

    $username = $_PUT["username"];
    $email = $_PUT["email"];
    $password = $_PUT["password"];
    $id = $_GET["id"];

    //sql
    $sql = "UPDATE users SET username='$username', email='$email', password='$password' WHERE id=$id";
    $query = mysqli_query(connection(), $sql);

    //response
    $response['status']['success'] = true;
    $response['status']['code'] = 200;
    $response['data'] = $_PUT;

    $data = json_encode($response);
    echo $data;
}