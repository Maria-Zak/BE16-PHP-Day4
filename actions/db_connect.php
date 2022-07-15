<?php

$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "restaurant";

$connect = new mysqli($hostname,$username,$password,$dbname);

if($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
 }else {
    //  echo "Successfully Connected";
 }