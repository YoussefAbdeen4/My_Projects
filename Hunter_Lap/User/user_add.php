<?php
session_start();
include_once '../connect.php';
include_once '../validation.php';
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['pass'];
$c_password = $_POST['c-pass'];
if (validate_register($name,$email,$password,$c_password)){
    try {
        $con = connect();
        $query = 'insert into `users` (`full_name`,`email`,`password`) values (:name,:email,:password)';
        $stat = $con->prepare($query);
        $stat->bindParam(":name",$name,PDO::PARAM_STR);
        $stat->bindParam(":email",$email,PDO::PARAM_STR);
        $stat->bindParam(":password",$password,PDO::PARAM_STR);
        $stat->execute();
        //echo 'match';
        if($stat->errorInfo()[2] == null){
            header("location:signin.php");
        
        }else {
            header("location:404.php");
        }
    }catch (Exception $e){

        header("location:404.php");
    }
}else {
   // print_r($_SESSION);
   header("location:regestiration.php");

}
