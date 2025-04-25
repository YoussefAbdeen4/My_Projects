<?php
include_once 'nav.php';
include_once 'gust.php';
?>
    <section class="page-form">
           <h2>Login</h2>
           <form class="Login" method="post" action="check_user.php">
               <div>
                   <label for="e">Email</label>
                   <input type="text" name="email" placeholder="E-mail" id="e">
               </div>
               <?php
               if (isset( $_SESSION['email-error']))echo '<div class="alert alert-danger" role="alert">'. $_SESSION['email-error'].'</div>';
               unset( $_SESSION['email-error']);
               ?>
               <div>
                   <label for="p">Password</label>
                   <input type="password" name="pass" placeholder="password" id="p">
               </div>
               <?php
               if (isset($_SESSION['pass-error']))echo '<div class="alert alert-danger" role="alert">'.$_SESSION['pass-error'].'</div>';
               unset($_SESSION['pass-error']);
               if (isset($_SESSION['login-error']))echo '<div class="alert alert-danger" role="alert">'.$_SESSION['login-error'].'</div>';
               unset($_SESSION['login-error']);
               ?>
               <input type="submit" name="login" value="Login">
           </form>
           <p>Do you have account? <a href="register.php" class="btn-login">Create account</a></p>
    </section>
<?php include_once 'footer.php'?>