<?php 

$server="localhost";
$server_name="root";
$server_password="";
// $server_database="testingmysqli";

// $conn=mysqli_connect($server,$server_name,$server_password,$server_database);

$conn=mysqli_connect($server,$server_name,$server_password);

if(!$conn){
    die("Connection Failed".mysqli_connect_error);
}
$create_database = "CREATE DATABASE if not exists phpmysql";

if(!mysqli_query($conn,$create_database)){
    echo "Error creating database: ". mysqli_error($conn);
}

$db_name = "phpmysql";

$conn = mysqli_connect($server,$server_name,$server_password,$db_name);

$create_table = "CREATE TABLE if not exists `users`(
    `id` int(7) NOT NULL AUTO_INCREMENT,
    `username` varchar(32) NOT NULL,
    `email` varchar(50) NOT NULL,
    `password` varchar(255) NOT NULL,

    PRIMARY KEY(`id`)
)";

if(!mysqli_query($conn,$create_table)){
    echo "Error Creating Table: ". mysqli_connect_error();
}

