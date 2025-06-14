<?php
session_start();
include_once '../connect.php';
include_once '../validation.php';
$email = $_POST['email'];
$pass = $_POST['pass'];
 $c_pass = $_POST['c-pass'];

if (validate_forgetPass($email,$pass,$c_pass)){
    try {
        $con = connect();
        $query = 'update `users` set `password` =:pass where `email`=:email';
        $stat = $con->prepare($query);
        $stat->bindParam(":email",$email,PDO::PARAM_STR);
        $stat->bindParam(":pass",$pass,PDO::PARAM_STR);
        $stat->execute();
        if($stat->errorInfo()[2] == null){
            header("location:signin.php");
        }else {
            header("location:404.php");
        }
    }catch (Exception $e){
        //echo $e->getMessage();
        header("location:404.php");
    }
}else {
    //print_r($_SESSION);
    header("location:password_recet.php");
}
