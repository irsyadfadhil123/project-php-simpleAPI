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