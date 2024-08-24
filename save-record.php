<?php

require_once("./template/db_connect.php");

$voucher = $_POST["voucher"];
$paidBy = $_POST["paid_by"];

$row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM products_at_conter"));




$sql = "INSERT INTO sold_products (voucher_number,barcode,name,quantity,price,cost,paid_by) SELECT  '$voucher',barcode,name,quantity,price,cost,'$paidBy'   FROM products_at_conter";

$deleteSql = "DELETE FROM products_at_conter";


if ($row) {

    if (mysqli_query($conn, $sql)){
        if (mysqli_query($conn, $deleteSql)) {

            header("Location:product-casher.php");
        }
    }
}else{
    header("Location:product-casher.php");
}
