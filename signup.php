<?php 

if($_SERVER["REQUEST_METHOD"]=="POST"){
     include 'dbconnect.php';

     $username=$_POST['username'];
     $email=$_POST['email'];
     $password=md5($_POST['password']);

     $query= "INSERT INTO `users` (`username`,`email`,`password`) VALUES ('$username','$email','$password')";
    $result = mysqli_query($conn,$query);
    if($result){
        echo "<script>alert('Data Inserted successfully');</script>" ;
    }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>signup</title>
</head>

<body>
    <nav>
        <a href="/loginsystem/welcome.php">Home</a>
        <a href="/loginsystem/login.php">Login</a>
        <a href="/loginsystem/signup.php">Signup</a>
    </nav>

    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
        <div class="form-group">
            <label for="username">Username: <input type="text" name="username" id="username"></label>
        </div>
        <div class="form-group">
            <label for="email">Email: <input type="text" name="email" id="email"></label>
        </div>
        <div class="form-group">
            <label for="password">Password: <input type="text" name="password" id="password"></label>
        </div>
        <input type="submit" value="signup" name="signup">
    </form>
</body>

</html>