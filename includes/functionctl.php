<?php


$server = "localhost";

$usn = "root";
$password = "";

$con = mysqli_connect($server, $username, $password, "published");
if(!$con){
    die("Connection to this database failed due to" . mysqli_connect_error());
}
$sql = "SELECT cat_name FROM `cat` WHERE id=$i";





?>