<?php

$conn = mysqli_connect("localhost", "ppn", "asdffdsa", "shopproducts");

if (!$conn) {
    echo mysqli_connect_error();
    die();
};
