<?php
session_start();
include_once 'connect.php';
$product_id = $_GET['id'];
$user_id = $_SESSION['id'];

try {
    $con = connect();
    $query = 'DELETE FROM `carts` WHERE `user_id` = :user_id AND `product_id` = :product_id';

    $stat = $con->prepare($query);
    $stat->bindParam("user_id", $user_id, PDO::PARAM_STR);
    $stat->bindParam("product_id", $product_id, PDO::PARAM_STR);
    $stat->execute();

    if ($stat->errorInfo()[2] == null) {
        header("location: cart.php?");
    } else {
        header("location: 404.php");
    }
} catch (Exception $e) {
    //echo $e->getMessage();
    header("location: 404.php");
}
?>
