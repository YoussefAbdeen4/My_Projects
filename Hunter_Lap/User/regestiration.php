<?php
session_start();
include_once 'gust.php';
//print_r($_SESSION);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hunter lap | Sign up</title>
    <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
</head>

<body class="signup">
    <a href="index.php"><img src="images/logo.png" alt="Hunterlap logo"></a>
    <div class="wrapper">
        <form action="user_add.php" method="post">
            <h1>Sign up</h1>
            <div class="input-box">
                <input type="text" name="name" id="name" placeholder="Name" required>
                <i class="fa-solid fa-user"></i>
            </div>
            <p  style="color: #b50303;"><small class="alert-default-danger"><?php if (isset($_SESSION['name-error'])) echo $_SESSION['name-error'];unset($_SESSION['name-error'])?></small></p>
            <div class="input-box">
                <input type="email" name="email" id="email" placeholder="email" required>
                <i class="fa-solid fa-envelope"></i>
            </div>
            <p  style="color: #b50303;"><small class="alert-default-danger"><?php if (isset($_SESSION['email-error'])) echo $_SESSION['email-error'];unset($_SESSION['email-error'])?></small></p>
            <div class="input-box">
                <input type="password" name="pass" id="password" placeholder="password" required>
                <i class="fa-solid fa-lock"></i>
            </div>
            <p  style="color: #b50303;"><small class="alert-default-danger"><?php if (isset($_SESSION['pass-error'])) echo $_SESSION['pass-error'];unset($_SESSION['pass-error'])?></small></p>
            <div class="input-box">
                <input type="password" name="c-pass" id="confirmpass" placeholder="Confirm Password" required>
                <i class="fa-solid fa-circle-check"></i>
            </div>
            <p  style="color: #b50303;"><small class="alert-default-danger"><?php if (isset($_SESSION['c-pass-error'])) echo $_SESSION['c-pass-error'];unset($_SESSION['c-pass-error'])?></small></p>
            <div class="signingup">
                <span>Already have an account?</span>
                <a href="signin.php">Sign in</a>
            </div>
            <button type="submit" class="signin-btn">Sign in</button>
        </form>
    </div>
</body>

</html>