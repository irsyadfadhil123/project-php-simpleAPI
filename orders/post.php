<?php

include '../conn.php';

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //input
    $user_id = $_POST["user_id"];
    $product_id = $_POST["product_id"];
    $quantity = $_POST["quantity"];
    $total_price = $_POST["total_price"];

    //sql
    $sql = "INSERT INTO orders (user_id, product_id, quantity, total_price) VALUES ('$user_id', '$product_id', '$quantity', '$total_price')";
    $query = mysqli_query(connection(), $sql);

    //response
    $response['status']['success'] = true;
    $response['status']['code'] = 200;
    $response['data'] = $_POST;

    $data = json_encode($response);
    echo $data;
}