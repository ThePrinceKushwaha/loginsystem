<?php 
$server="localhost";
$server_username="root";
$password="";
$database="users";

$conn = mysqli_connect($server,$server_username,$password,$database);

if(!$conn){
    die("Error: ". mysqli_connect_error());
}
