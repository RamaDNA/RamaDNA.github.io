<?php 

$conn = mysqli_connect("localhost","root","","web1");

if($conn -> connect_errno){
    echo "faield to connect". $conn -> mysqli_errno;
    exit();
};

?>