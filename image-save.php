<?php

require_once("./template/db_connect.php");




$name = $_POST["name"];


$file = $_FILES['image']['tmp_name'];
$imageData = base64_encode(file_get_contents(addslashes($file)));

// print_r($imageData);



$sql = "INSERT INTO images (name,image) VALUES ('$name','$imageData')";

if(mysqli_query($conn,$sql)){
    header("Location:image-form.php");
}




