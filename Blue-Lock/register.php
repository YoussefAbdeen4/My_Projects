<?php
include_once 'nav.php';
include_once 'gust.php';
?>
    <section class="page-form">
        <h2>Register</h2>
        <form class="Login" method="post" action="add_user.php" enctype="multipart/form-data">
            <div class="input">
                <label for="fn">First name</label>
                <input type="text" placeholder="First name" name="fname" id="fn" required value="<?php if (isset($_SESSION['first_name']))echo $_SESSION['first_name'];unset($_SESSION['first_name']) ?>">
            </div>
            <?php
            if (isset($_SESSION['first_name-error']))echo '<div class="alert alert-danger" role="alert">'.$_SESSION['first_name-error'].'</div>';
            unset($_SESSION['first_name-error']);
            ?>
            <div class="input">
                <label for="ln">last name</label>
                <input type="text" placeholder="last name" name="lname" id="ln" required value="<?php if (isset($_SESSION['last_name']))echo $_SESSION['last_name'];unset($_SESSION['last_name']) ?>">
            </div>
            <?php
            if (isset($_SESSION['last_name-error']))echo '<div class="alert alert-danger" role="alert">'.$_SESSION['last_name-error'].'</div>';
            unset($_SESSION['last_name-error']);
            ?>
            <div class="input">
                <label for="e">Email</label>
                <input type="email" placeholder="E-mail" name="email" id="e" required value="<?php if (isset($_SESSION['email']))echo $_SESSION['email'];unset($_SESSION['email']) ?>">
            </div>
            <?php
            if (isset($_SESSION['email-error']))echo '<div class="alert alert-danger"  role="alert">'.$_SESSION['email-error'].'</div>';
            unset($_SESSION['email-error']);
            ?>
            <div class="input">
                <label for="p">Phone number</label>
                <input type="text" placeholder="Phone number" name="phone" id="p" required value="<?php if (isset($_SESSION['phone']))echo $_SESSION['phone'];unset($_SESSION['phone']) ?>">
            </div>
            <?php
            if (isset($_SESSION['phone-error']))echo '<div class="alert alert-danger" role="alert">'.$_SESSION['phone-error'].'</div>';
            unset($_SESSION['phone-error']);
            ?>
            <div class="input">
                <label for="pass">Password</label>
                <input type="password" placeholder="password" name="pass" id="pass" required value="<?php if (isset($_SESSION['pass']))echo $_SESSION['pass'];unset($_SESSION['pass']) ?>">
            </div>
            <?php
            if (isset($_SESSION['pass-error']))echo '<div class="alert alert-danger" role="alert">'. $_SESSION['pass-error'].'</div>';
            unset($_SESSION['pass-error']);
            ?>
            <div class="input">
                <label for="c_pass">Confirm password</label>
                <input type="password" placeholder="Confirm password" name="c_pass" id="c_pass" required>
            </div>
            <?php
            if (isset($_SESSION['c-pass-error']))echo '<div class="alert alert-danger" role="alert">'. $_SESSION['c-pass-error'].'</div>';
            unset($_SESSION['c-pass-error']);
            ?>
            <div class="input">
                <label>gender</label><br>
                <input type="radio" id="m" name="gender" value="m" required>
                <label for="m">Male</label><br>
                <input type="radio" id="f" name="gender" value="f" required>
                <label for="f">Female</label><br>
            </div>
            <div class="input">
                <input type="submit" name="register" value="Register">
            </div>
        </form>
    </section>
<?php include_once 'footer.php';?>