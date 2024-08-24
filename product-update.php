<?php

require_once("./template/db_connect.php");

$row_id = $_POST["row_id"];
$barcode = $_POST["barcode"];
$name = $_POST["name"];
$price = $_POST["price"];
$stock = $_POST["stock"];

$sql = "UPDATE products SET barcode='$barcode',product_name='$name',price='$price',stock='$stock' where id=$row_id";

if(mysqli_query($conn,$sql)){
    header("Location:product-list.php");
}


