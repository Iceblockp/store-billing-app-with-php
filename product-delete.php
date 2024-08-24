<?php

require_once("./template/db_connect.php");

$row_id = $_GET["row_id"];

$sql = "DELETE FROM products WHERE id=$row_id";

if(mysqli_query($conn,$sql)){
    header("Location:product-list.php");
}