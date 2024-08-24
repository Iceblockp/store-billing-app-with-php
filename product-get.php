<?php


require_once("./template/db_connect.php");

$getBarcode = $_GET["barcode"];

$sql = "SELECT * FROM products where barcode='$getBarcode'";

$query = mysqli_query($conn,$sql);

$row = mysqli_fetch_assoc($query);

print_r(json_encode($row));



