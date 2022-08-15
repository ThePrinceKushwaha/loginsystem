<?php 

$err=$email=$username=$password="";
$email_err=$username_err=$password_err="";

function test_input($data){
    $data=trim($data);
    $data=stripslashes($data);
    // $data= specialhtmlchars($data);
    return $data;
}
if($_SERVER["REQUEST_METHOD"]=="POST"){
    //  include 'dbconnect.php';
    include "connect.php";

    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];

    if(empty($username)){
        $username_err="Name cannot be blank";
        $err=1;
    } else{
        if(!preg_match("/^[a-zA-Z]*$/",$username)){
            $username_err="Invalid username format";
            $err=1;
        }
    }


    if(empty($email)){
        $email_err = "Email cannot be blank";
        $err=1;
    } else{
        if(!preg_match("/^[a-z]{3,}@[a-z]{3,}[.]{1}[a-z]{3}$/",$email)){
            $email_err="Invalid email format. example@example.com";
        }
    }


    if(empty($_POST['password'])){
        $password_err="Password cannot be blank";
        $err=1;
    } else{
        if(!preg_match("/^[a-zA-Z0-9]{5,}$/",$password)){
            $password_err="password must be at least 5 characters";
            $err=1;
        }
    }

if($err!=1){
    $has_password = md5($password);
     $query= "INSERT INTO `users` (`username`,`email`,`password`) VALUES ('$username','$email','$has_password')";
    $result = mysqli_query($conn,$query);
    if($result){
        echo "<script>alert('Data Inserted successfully');</script>" ;
    }
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
            <label for="username">Username: <input type="text" name="username" id="username" value="<?php // echo $username; ?>"></label>
            <span style="color:red;"><?php echo $username_err; ?></span>
        </div>
        <div class="form-group">
            <label for="email">Email: <input type="text" name="email" id="email" value="<?php //echo $email; ?>"></label>
            <span style="color:red;"><?php echo $email_err; ?></span>
        </div>
        <div class="form-group">
            <label for="password">Password: <input type="text" name="password" id="password" value="<?php //echo $password; ?>"></label>
            <span style="color:red;"><?php echo $password_err; ?></span>
        </div>
        <input type="submit" value="signup" name="signup">
    </form>
</body>

</html>