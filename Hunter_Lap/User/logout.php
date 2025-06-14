<?php
session_start();
session_unset();
session_destroy();
setcookie("remember_email","",time()-1);
setcookie("remember","",time()-1);
header("location:index.php");