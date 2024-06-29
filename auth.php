<?php
session_start();

if (isset($_GET['logout'])) {
    session_destroy();

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>

    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        img {
            width: 450px;
            height: 450px;
        }

        input {
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>Welcome, You successfully logged in</h1>
    </div>
    <div class="container">
        <img src="img.jpg" alt="">
    </div>
    <div class="container">
        <input type="button" value="Logout" onclick="logout()">
    </div>

    <script>
        function logout() {
            window.location.href = "?logout=true";
        }
    </script>

</body>

</html>
