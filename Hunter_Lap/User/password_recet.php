<?php
session_start();
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
    <form action="passwoer_update.php" method="post">
        <h1>Reset Password</h1>
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
        <button type="submit" class="signin-btn">Reset password</button>
    </form>
</div>
</body>

</html>