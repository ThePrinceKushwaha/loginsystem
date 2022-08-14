<?php
if(isset($_POST['login'])){
    include "dbconnect.php";
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=md5($_POST['password']);

    $sql = "SELECT * FROM users WHERE email ='$email' AND password='$password' ";
    $result = mysqli_query($conn,$sql);

    $num = mysqli_num_rows($result);
    if($num==1){
        $login=true;
        // echo "You're logged in.";

        session_start();

        $_SESSION['loggedin']=true;
        $_SESSION['email']=$email;

        header("location: welcome.php");
    }
    else{
        echo "Invalid Credentials";
        
    }

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
    <nav>
        <a href="/loginsystem/welcome.php">Home</a>
        <a href="/loginsystem/login.php">Login</a>
        <a href="/loginsystem/signup.php">Signup</a>
    </nav>
    <form action="" method="POST">
        <div class="form-group">
            <label for="email">Email: <input type="text" name="email" id="email"></label>
        </div>
        <div class="form-group">
            <label for="password">Password: <input type="text" name="password" id="password"></label>
        </div>
        <input type="submit" value="login" name="login">
    </form>
</body>
</html>