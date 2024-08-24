<?php

require_once("./template/db_connect.php");

$barcode = $_POST["barcode"];
$name = $_POST["name"];
$price = $_POST["price"];
$stock = $_POST["stock"];

$checkSql = "SELECT * FROM products WHERE barcode=$barcode";
$query = mysqli_query($conn, $checkSql);

$row = mysqli_fetch_assoc($query);



if ($row['barcode']) {

    $updateQuantity = $row['stock'] + $stock;

    $updateSql = "UPDATE products SET stock='$updateQuantity'  WHERE barcode=$barcode";
    if(mysqli_query($conn,$updateSql)){
        header("Location:product-create.php");
    }


} else {
    $sql = "INSERT INTO products (barcode,product_name,price,stock) VALUES ('$barcode','$name','$price','$stock')";

    if (mysqli_query($conn, $sql)) {
        header("Location:product-create.php");
    }
}


print_r($_POST);
