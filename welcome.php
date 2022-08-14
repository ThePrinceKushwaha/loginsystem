<?php 
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location:login.php");
    exit;
}
// include "dbconnect.php";
include "connect.php";
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Welcome - <?php $_SESSION['username']; ?></title>
</head>
<body>
    <h1>welcome - <?php echo $_SESSION['email']; ?></h1>
<nav>
        <a href="/loginsystem/welcome.php">Home</a>

        <a href="/loginsystem/logout.php">Logout</a>
    </nav>
</body>
</html>