<?php
include 'database/connection.php';
          
?>  


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beauty Queen Parlour</title>
    <link rel="stylesheet" href="styles/home.css">
    <link rel="stylesheet" href="styles/login.css">
</head>
<body background="https://wallpaperaccess.com/full/1204586.jpg">
<?php include 'header.php';?>

<div class="container">
        <form name="f1" action=""  method="POST" class="form" target="">
            <div class="login-form">
                <h1 class="text-center">Register</h1>
                <input class="margin-high" type="text" name="firstName" placeholder="First Name">
                <input class="margin-low" type="text" name="lastName" placeholder="Last Name">
                <input class="margin-low" type="email" name="email" placeholder="Email">
                <input class="margin-low" type="text" name="username" placeholder="User Name">
                <input class="margin-low" type="password" name="password" placeholder="Password">
                <div class="text-center">
                    <button class="margin-high login-btn" type="submit" name="register">Register</button>
                    <button class="margin-high login-btn" type="reset" name="reset">Clear</button>
                </div>
                <br>
                <center><a href="userlogin.php">Already have an account</a></center>
            </div>
        </form>
    </div>

<br><br>
<?php include 'footer.php'; ?>
</body>
</html>