<?php
session_start();
include_once 'connect.php';
include_once 'validation.php';
$first_name = $_POST['fname'];
$last_name = $_POST['lname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['pass'];
$c_password = $_POST['c_pass'];
$gender = $_POST['gender'];
$img = $_FILES['img']['name'];
if (validate_register($first_name,$last_name,$email,$phone,$password,$c_password)){
    try {
        $con = connect();
        $query = 'insert into `users` (`first_name`,`last_name`,`email`,`phone`,`password`,`gender`,`img`) values (:first_name,:last_name,:email,:phone,:password,:gender,:img)';
        $stat = $con->prepare($query);
        $stat->bindParam(":first_name",$first_name,PDO::PARAM_STR);
        $stat->bindParam(":last_name",$last_name,PDO::PARAM_STR);
        $stat->bindParam(":email",$email,PDO::PARAM_STR);
        $stat->bindParam(":phone",$phone,PDO::PARAM_STR);
        $stat->bindParam(":password",$password,PDO::PARAM_STR);
        $stat->bindParam(":gender",$gender,PDO::PARAM_STR);
        $stat->bindParam(":img",$img,PDO::PARAM_STR);
        $stat->execute();
        echo 'match';
        if($stat->errorInfo()[2] == null){
            header("location:login.php");
        }else {
        header("location:404.php");
        }
    }catch (Exception $e){

       header("location:404.php");
    }
}else {
    header("location:register.php");
}