<?php
@include 'config.php';

session_start();

if (isset($_POST['submit'])) {

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = $_POST['password'];
    $cpass = $_POST['cpassword'];


    $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass'";

    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {
        $error[] = 'user already exist';
    } else {
        if ($pass != $cpass) {
            $error[] = 'password not mathched!';
        } else {
            $insert = "INSERT INTO user_form(email, password) VALUES('$email','$pass')";
            mysqli_query($conn, $insert);
            header('location:login.php');
        }
    }

}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Now</title>
    <style>

        .reg-container{
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .reg-form{
            background-color: rgb(205, 213, 255);
            width: 350px;
            height: 450px;
            border-radius: 25px;
            border: 2px solid rgb(0, 0, 0);
        }
        .reg-form h1{
            text-align: center;
            color: rgb(255, 98, 0);
            
        }
        .reg-form .box{
            display: block;
            width:  305px;
            height: 45px;
            margin: 20px;
            background-color: rgb(205, 213, 255);
            border: 1px solid rgb(0, 0, 0);
        }

        .reg-form .box::placeholder{
            color: rgb(255, 0, 0);
        }
        
        .btn {
            border: .2rem solid #130f40;
            margin-top: 8rem;
            display: block;
            margin: auto;
            padding: .8rem 3rem;
            font-size: 1.7rem;
            border-radius: .5rem;
            color: #130f40;
            cursor: pointer;
            background: none;

        }

        .btn:hover {
            background: green;
            color: #fff;
        }
    </style>
</head>

<body>
    <div class="reg-container">
        <form action="" method="post" class="reg-form">

            <h1>Register Now</h1>
            <input type="email" name="email" placeholder="Enter your email" class="box" required>
            <input type="password" name="password" placeholder="Enter your password" class="box" required>
            <input type="password" name="cpassword" placeholder="Renter your password" class="box" required>
            <p>Do Have An Account<a href="login.php"> Login </a></p>

            <input type="submit" value="Register Now" name="submit" class="btn">
        </form>
    </div>
</body>

</html>