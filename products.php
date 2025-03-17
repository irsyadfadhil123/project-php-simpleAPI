<?php

include 'conn.php';

header("Content-type: application/json");

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // sql
    $sql = "SELECT * FROM products";
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
    $name = $_POST["name"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $stock = $_POST["stock"];

    //sql
    $sql = "INSERT INTO products (name, description, price, stock) VALUES ('$name', '$description', '$price', '$stock')";
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

    $name = $_PUT["name"];
    $description = $_PUT["description"];
    $price = $_PUT["price"];
    $stock = $_PUT["stock"];
    $id = $_GET["id"];

    //sql
    $sql = "UPDATE products SET name='$name', description='$description', price='$price', stock='$stock' WHERE id=$id";
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
    $sql = "DELETE FROM products WHERE id=$id";
    $query = mysqli_query(connection(), $sql);

    //response
    $response['status']['success'] = true;
    $response['status']['code'] = 200;
    $response['data'] = array();

    $data = json_encode($response);
    echo $data;
}