<footer>
    <h4>Quick Links</h4>
    <ul class="footer-links">
        <?php
        if (isset($_SESSION['id']) and $_SESSION['id']==1){
            ?>
            <li>
                <a href="catigory.php">Add</a>
            </li>
            <?php
        }
        ?>
        <li>
            <a href="catigory.php">Leagues</a>
        </li>
        <li>
            <a href="clubs.php">Clubs</a>
        </li>
        <li>
            <a href="kits.php">Kits</a>
        </li>
        <?php
        if (isset($_SESSION['id'])){
            echo "<p>{$_SESSION['fname']}&nbsp;&nbsp;{$_SESSION['lname']}</p>";

            ?>
            <li>

                <a href="logout.php">Logout</a>
            </li>
            <?php
        }else {
            ?>
            <li>
                <a href="register.php">Register</a>
            </li>
            <li>
                <a href="login.php">Login</a>
            </li>
        <?php } ?>
    </ul>
    <ul class="contact-info">
        <li>Name: Youssef Abdeen Ramadan</li>
        <li>Phone: +20123226858</li>
        <li>
            <a href="mailto:abdeenyoussef9@gmail.com" target="_blank">
                <img src="imgs/icons8-gmail-48.png" alt="Gmail">
            </a>

            <a href="https://www.linkedin.com/in/youssef-abdeen-943577270" target="_blank">
                <img src="imgs/icons8-linkedin-50%20(1).png" alt="LinkedIn">
            </a>
            <a href="https://www.facebook.com/profile.php?id=100092998103442" target="_blank">
                <img src="imgs/icons8-facebook-50%20(1).png" alt="Facebook">
            </a>
        </li>
    </ul>
</footer>

<div class="devolper">
    <p>Copyright @2025 All right reserved. This template is made with🤍 by <span>Youssef Abdeen</span> </p>
</div>

</body>
</html>
