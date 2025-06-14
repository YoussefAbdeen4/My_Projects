<?php
session_start();
include_once '../validation.php';
include_once '../connect.php';
$id = $_POST['id'];
$name = $_POST['name'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];
$desc = $_POST['desc'];
$status = $_POST['status'];
$img = $_FILES['img']['name'];
if (validate_product($name, $desc, $quantity, $price)) {
    try {
        $con = connect();
        $query = 'UPDATE `products` set `name` = :name , `desc` =:desc ,`price` =:price , `quantity` =:quantity ,`status`=:status,`img`=:img where id=:id';//product
        $stat = $con->prepare($query);
        $stat->bindParam("name", $name, PDO::PARAM_STR);
        $stat->bindParam("price", $price, PDO::PARAM_STR);
        $stat->bindParam("img", $img, PDO::PARAM_STR);
        $stat->bindParam("desc", $desc, PDO::PARAM_STR);
        $stat->bindParam("quantity", $quantity, PDO::PARAM_STR);
        $stat->bindParam("status", $status, PDO::PARAM_STR);
        $stat->bindParam("id", $id, PDO::PARAM_STR);
        $stat->execute();
        if ($stat->errorInfo()[2] == null) {
            header("location:product_view.php");
        } else {
            header("location:404.php");
        }
    } catch (Exception $e) {
        echo $e->getMessage();
        header("location:404.php");
    }
} else {
    header("location:product_edit.php");
}
