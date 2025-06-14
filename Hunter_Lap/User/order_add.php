<?php
session_start();
include_once '../validation.php';
include_once '../connect.php';
$user_id = $_POST['user-id'];
$product_id = $_POST['product-id'];
$price=$_REQUEST['price'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$add = $_POST['address'];
$card_number = $_POST['payment'];
$quantity = $_POST['quantity']-$_POST['cart_quantity'];
if (validate_checkout($email,$phone,$add,$card_number)){
    try {
        $con = connect();
        $query = 'insert into `orders` (`user_id`,`product_id`,`user_email`,`user_phone`,`user_address`,`total_price`) values (:user_id,:product_id,:email,:phone,:add,:price)';
        $stat = $con->prepare($query);
        $stat->bindParam("user_id",$user_id,PDO::PARAM_STR);
        $stat->bindParam("product_id",$product_id,PDO::PARAM_STR);
        $stat->bindParam("email",$email,PDO::PARAM_STR);
        $stat->bindParam("phone",$phone,PDO::PARAM_STR);
        $stat->bindParam("add",$add,PDO::PARAM_STR);
        $stat->bindParam("price",$price,PDO::PARAM_STR);
        $stat->execute();
        if ($stat->errorInfo()[2]==null){
            $query = 'update `products` set `quantity`=:quantity where id=:id';
            $stat = $con->prepare($query);
            $stat->bindParam("quantity",$quantity,PDO::PARAM_STR);
            $stat->bindParam("id",$product_id,PDO::PARAM_STR);
            $stat->execute();
            if ($stat->errorInfo()[2]==null){
                header("location:cart.php");
            }else {
                header("location:404.php");
            }
        }else {
            header("location:404.php");
        }
    }catch (Exception $e){
        header("location:404.php");
    }
}else {
    header("location:checkout.php");
}