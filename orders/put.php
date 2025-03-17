<?php

include '../conn.php';

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "PUT") {
    //input
    parse_str(file_get_contents('php://input'), $_PUT);

    $user_id = $_PUT["user_id"];
    $product_id = $_PUT["product_id"];
    $quantity = $_PUT["quantity"];
    $total_price = $_PUT["total_price"];
    $id = $_GET["id"];

    //sql
    $sql = "UPDATE orders SET user_id='$user_id', product_id='$product_id', quantity='$quantity', total_price='$total_price' WHERE id=$id";
    $query = mysqli_query(connection(), $sql);

    //response
    $response['status']['success'] = true;
    $response['status']['code'] = 200;
    $response['data'] = $_PUT;

    $data = json_encode($response);
    echo $data;
}