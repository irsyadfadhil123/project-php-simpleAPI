<?php

include '../conn.php';

header('Content-Type: application/json');

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