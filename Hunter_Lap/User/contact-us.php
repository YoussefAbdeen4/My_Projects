<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>اتصل بنا</title>
    <link rel="stylesheet" href="contact-style.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
include_once 'nav.php';
include_once 'auth.php';
?>
<header>
    <h1>التواصل</h1>
</header>

<main>
    <div class="contact-container">
        <div class="info-section">
            <h2>Hunter lap</h2>
            <address>
                123 Testing Ave, Testtown, 9876 NA<br>
                Phone: +1 234 56789012
            </address>
        </div>

        <div class="form-section">
            <form action="massage_add.php" method="POST">
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" id="subject" name="sub" required>
                </div>
                <p  style="color: #b50303;"><small class="alert-default-danger"><?php if (isset($_SESSION['sub-error'])) echo $_SESSION['sub-error'];unset($_SESSION['sub-error'])?></small></p>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="msg" rows="5" required></textarea>
                </div>
                <p  style="color: #b50303;"><small class="alert-default-danger"><?php if (isset($_SESSION['msg-error'])) echo $_SESSION['msg-error'];unset($_SESSION['msg-error'])?></small></p>
                <button type="submit">Send message</button>
            </form>
        </div>
    </div>
</main>
<?php include_once 'footer.php'?>
</body>
</html>