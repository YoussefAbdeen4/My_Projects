<?php
session_start();
include_once '../connect.php';
include_once '../validation.php';
$email = $_POST['email'];
$pass = $_POST['pass'];

if (validate_login($email,$pass)){
    try {
        $con = connect();
        $query = 'select `id` , `full_name` from `users` where `email`=:email and `password`=:pass';
        $stat = $con->prepare($query);
        $stat->bindParam(":email",$email,PDO::PARAM_STR);
        $stat->bindParam(":pass",$pass,PDO::PARAM_STR);
        $stat->execute();
        if ($stat->rowCount()>0){
            $user = $stat->fetchObject();
            $_SESSION['user-id']=$user->id;
            $_SESSION['user-name']=$user->full_name;
            if (isset($_POST['remember'])){
                $remember = $_POST['remember'];
                setcookie("remember_email",$email,strtotime("+1 year"));
                setcookie("remember",$remember,strtotime("+1 year"));
            }else{
                setcookie("remember_email","",time()-1);
                setcookie("remember","",time()-1);
            }
            header("location:index.php");
        } else {
            $_SESSION['login-error'] = 'Invalid email or password...!';
           header("location:signin.php");
           // لو اليوزر مدخل ايميل او باس غلط
        }
    }catch (Exception $e){
//echo $e->getMessage();
       header("location:404.php");
    }
}else {
    //print_r($_SESSION);
    header("location:signin.php");
    // لو الفالديشن غلط
}
