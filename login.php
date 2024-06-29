<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){
    
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = $_POST['password'];

   $select = "SELECT * FROM user_form WHERE email = '$email' && password = '$pass'";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){
      $_SESSION['email'] = $email;
      header('location:auth.php');
   }else{
      $error = 'Incorrect email or password.';
   }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Now</title>
    <style>
        .log-container{
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .log-form{
            background-color: #F7F9F2;
            width: 350px;
            height: 350px;
            border-radius: 25px;
            border: 2px solid rgb(0, 0, 0);
            padding: 20px;
        }
        .log-form h1{
            text-align: center;
            color: rgb(255, 98, 0);
        }
        .log-form .box{
            display: block;
            width:  305px;
            height: 45px;
            margin: 20px;
            background-color: #F7F9F2;
            border: 1px solid rgb(0, 0, 0);
        }
        .log-form .box::placeholder{
            color: rgb(255, 0, 0);
        }
        .btn {
            border: .2rem solid black;
            margin-top: 8rem;
            display: block;
            margin: auto;
            padding: .8rem 3rem;
            font-size: 1.7rem;
            border-radius: .5rem;
            color: #91DDCF;
            cursor: pointer;
            background: none;
        }
        .btn:hover {
            background: green;
            color: #fff;
        }
        .error-msg {
            color: red;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="log-container">
        <form action="" method="post" class="log-form">
            <h1>Login Now</h1>
            <?php
            if(isset($error)){
                echo '<p class="error-msg">'.$error.'</p>';
            }
            ?>
            <input type="email" name="email" placeholder="Enter your email" class="box" required>
            <input type="password" name="password" placeholder="Enter your password" class="box" required>
            <p>Don't Have An Account?<a href="register.php"> Register </a></p>
            <input type="submit" value="Login Now" name="submit" class="btn">
        </form>
    </div>
</body>

</html>
