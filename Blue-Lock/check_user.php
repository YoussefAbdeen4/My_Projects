<?php
session_start();
include_once 'connect.php';
include_once 'validation.php';
$email = $_POST['email'];
$pass = $_POST['pass'];
if (validate_login($email,$pass)){
    try {
        $con = connect();
        $query = 'select `id` , `first_name` , `last_name` from `users` where `email`=:email and `password`=:pass';
        $stat = $con->prepare($query);
        $stat->bindParam(":email",$email,PDO::PARAM_STR);
        $stat->bindParam(":pass",$pass,PDO::PARAM_STR);
        $stat->execute();
        if ($stat->rowCount()>0){
            $user = $stat->fetchObject();
            $_SESSION['id']=$user->id;
            $_SESSION['fname']=$user->first_name;
            $_SESSION['lname']=$user->last_name;
            header("location:index.php");
        } else {
            $_SESSION['login-error'] = 'Invalid email or password...!';
            header("location:login.php");
        }
    }catch (Exception $e){
        header("location:404.php");
    }
}else {
    header("location:login.php");
}