<?php

function connection()
{
    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "fadhilSQL123";
    $db_name = "toko_online";

    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

    if (!$conn) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    return $conn;
}