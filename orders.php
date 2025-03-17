<?php

include 'conn.php';

header("Content-type: application/json");

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // sql
    $sql = "SELECT * FROM orders";
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