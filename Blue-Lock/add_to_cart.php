<?php
session_start();
include_once 'validation.php';
include_once 'connect.php';
$product_id=$_GET['id'];
$user_id=$_SESSION['id'];
try {
    $con = connect();
    $query = 'insert into `carts` (`user_id`,`product_id`) values (:user_id,:product_id)';
    $stat = $con->prepare($query);
    $stat->bindParam("user_id",$user_id,PDO::PARAM_STR);
    $stat->bindParam("product_id",$product_id,PDO::PARAM_STR);
    $stat->execute();
    if ($stat->errorInfo()[2]==null){
        header("location:cart.php?id={$product_id}");
    }else {
        header("location:404.php");
    }
}catch (Exception $e){
    $err = "Product is exist";
    header("location:cart.php?err={$err}");
}
