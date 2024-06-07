<?php
include 'connection.php';

$id = $_POST['id'];
$product_name = $_POST['product_name'];
$product_id = $_POST['product_id'];
$product_variant = $_POST['product_variant'];

mysqli_query($conn, "UPDATE products SET product_name='$product_name', product_id='$product_id', product_variant='$product_variant' WHERE id=$id");
?>