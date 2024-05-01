<?php 
$conn = mysqli_connect('localhost','root','','inventory_management');

if(!$conn){
    die('Error Connecting To The Database'.mysqli_connect_error($conn));
}