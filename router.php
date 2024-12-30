<?php
include('helper.php');
$name=$_POST['txtname'];
$description=$_POST['txtdes'];
$price=$_POST['txtprice'];
$quandity=$_POST['qty'];
$file_data = $_FILES['imageUpload'];
$dest="./uplords/images".$file_data['name'];
$source=$file_data['tmp_name'];
move_uploaded_file($source,$dest);
product_insert($name,$description,$price,$quandity,$dest);
header('location:product.php');


?>
