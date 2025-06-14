<nav class="navbar">
    <div class="container">
        <a href="index.php"><img src="images/logo.png" alt="logo"></a>
        <div>
            <div class="nav-actions">
                <?php
                session_start();
                include_once '../connect.php';
                $sum=0;
                //print_r($_SESSION);
                if (isset($_SESSION['user-id']) and isset($_SESSION['user-name'])){
                    echo '<a href="logout.php" class="login-btn">تسجيل الخروج</a>';
                    $user_id=$_SESSION['user-id'];
                    $con= connect();
                    $query = 'select sum(quantity) as sum from `carts` where user_id=:user_id';
                    $stat = $con->prepare($query);
                    $stat->bindParam(":user_id",$user_id,PDO::PARAM_STR);
                    $stat->execute();
                    $cnt=$stat->fetchAll(PDO::FETCH_ASSOC);//array()
                    //print_r($cnt);
                    if (isset($cnt[0]['sum'])) $sum=$cnt[0]['sum'];
                }else {
                  echo '<a href="signin.php" class="login-btn">تسجيل الدخول</a>';
                }
                ?>
                <a class="cart-btn" href="cart.php">🛒
                    <span class="cart-count">
                        <?= $sum ?>
                    </span>
                </a>
            </div>
            <span class="hamburger">☰</span>
            <div class="nav-links">
                <ul>
                    <?php
                    if (isset($_SESSION['user-id']) and $_SESSION['user-id']<100){ // 100 (>1,2,)
                        echo ' <li><a href="../Admin/index.php">لوحه التحكم</a></li>';
                    }
                    ?>
                    <li><a href="index.php">الرئيسية</a></li>
                    <li><a href="contact-us.php">اتصل بنا</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>
