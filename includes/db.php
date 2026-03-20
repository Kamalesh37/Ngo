<?php

$host = "localhost";
$user = "root";
$password = "";
$dbname = "ngo_cms";

$conn = mysqli_connect($host,$user,$password,$dbname);

if(!$conn){
    die("Connection Failed");
}

?>