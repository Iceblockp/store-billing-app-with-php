<?php

require_once("./template/db_connect.php");

$rowId = $_GET["row_id"];

$sql = "DELETE FROM products_at_conter WHERE id=$rowId";

$billRow = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM products_at_conter WHERE id=$rowId"));

$quantity = $billRow["quantity"];
$barcode = $billRow["barcode"];



$row = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM products WHERE barcode=$barcode"));
$updateStock = $row["stock"] + $quantity;

if(mysqli_query($conn,$sql)){

    $addStock = "UPDATE products SET stock=$updateStock WHERE barcode=$barcode";
    if(mysqli_query($conn,$addStock)){

        header("Location:product-casher.php");
    }
};
