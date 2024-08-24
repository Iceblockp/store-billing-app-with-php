<?php 

require_once("./template/db_connect.php");

$barcode = $_POST["barcode"];
$name = $_POST['name'];
$price = $_POST["price"];
$quantity = $_POST["quantity"];
$cost = $_POST["price"] * $_POST["quantity"];

$sql = "INSERT INTO products_at_conter (barcode,name,price,quantity,cost) VALUES ('$barcode','$name','$price','$quantity','$cost')";

$row = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM products WHERE barcode=$barcode"));
$updateStock = $row["stock"] - $quantity;

if(mysqli_query($conn,$sql)){

    $stockSql = "UPDATE products SET stock=$updateStock WHERE barcode=$barcode";
    if(mysqli_query($conn,$stockSql)){

        header("Location:product-casher.php");
    }

}




