<?php
session_start();
include_once '../auth.php';
include_once '../connect.php';
$user_id = $_SESSION['user-id'];
$product_id = $_REQUEST['id'];
$quantity = 1;
/***
 * 1=>1
 * 2=>2
 */
try {
    $con= connect();
    //CHEK 
    $query = 'select `quantity` from `carts` where user_id=:user_id and product_id=:product_id';
    $stat = $con->prepare($query);
    $stat->bindParam(":user_id",$user_id,PDO::PARAM_STR);
    $stat->bindParam(":product_id",$product_id,PDO::PARAM_STR);
    $stat->execute();
    $cnt=$stat->fetchAll(PDO::FETCH_ASSOC);
    //print_r($cnt);
    if (isset($cnt[0]['quantity'])){
        //update
        $quantity = $cnt[0]['quantity']+1;
        $query = 'update `carts` set `quantity` =:quantity  where user_id=:user_id and product_id=:product_id';
    }else {
        // add
        $query = 'insert into `carts` (`product_id`,`user_id`,`quantity`) values (:product_id,:user_id,:quantity)';
    }
    $stat = $con->prepare($query);
    $stat->bindParam(":quantity",$quantity,PDO::PARAM_STR);
    $stat->bindParam(":user_id",$user_id,PDO::PARAM_STR);
    $stat->bindParam(":product_id",$product_id,PDO::PARAM_STR);
    $stat->execute();
    if($stat->errorInfo()[2] == null){
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            header("location:cart.php");
        }else  header("location:index.php");//GET
    }else {
        header("location:404.php");
    }

}catch (Exception $e){
    //echo $e->getMessage();
    header("location:404.php");
}