<?php
session_start();
include_once '../connect.php';
include_once '../validation.php';
$subject = $_POST['sub'];
$massage = $_POST['msg'];
$id = $_SESSION['user-id'];
if (validate_massage($subject,$massage)){
    try {
        $con = connect();
        $query = 'insert into `contact` (`subject`,`massage`,`user_id`) values (:subject,:massage,:id)';
        $stat = $con->prepare($query);
        $stat->bindParam(":subject",$subject,PDO::PARAM_STR);
        $stat->bindParam(":massage",$massage,PDO::PARAM_STR);
        $stat->bindParam(":id",$id,PDO::PARAM_STR);
        $stat->execute();
        //echo 'match';
        if($stat->errorInfo()[2] == null){
            header("location:contact-us.php");
        }else {
            header("location:404.php");
        }
    }catch (Exception $e){
        header("location:404.php");
    }
}else {
    // print_r($_SESSION);
    header("location:contact-us.php");

}
