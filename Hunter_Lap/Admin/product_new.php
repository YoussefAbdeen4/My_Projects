<?php
session_start();
include_once '../validation.php';
include_once '../connect.php';
$name = $_POST['name'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];
$desc = $_POST['desc'];
$status = $_POST['status'];
$img = $_FILES['img']['name'];
if (validate_product($name, $desc, $quantity, $price)) {
    try {
        $con = connect();
        $query = 'insert into `products` (`name`,`price`,`img`,`desc`,`quantity`,`status`) values (:name,:price,:img,:desc,:quantity,:status)';
        $stat = $con->prepare($query);
        $stat->bindParam("name", $name, PDO::PARAM_STR);
        $stat->bindParam("price", $price, PDO::PARAM_STR);
        $stat->bindParam("img", $img, PDO::PARAM_STR);
        $stat->bindParam("desc", $desc, PDO::PARAM_STR);
        $stat->bindParam("quantity", $quantity, PDO::PARAM_STR);
        $stat->bindParam("status", $status, PDO::PARAM_STR);
        $stat->execute();
        if ($stat->errorInfo()[2] == null) {
            if (isset($_POST['add'])) header("location:product_view.php");
            else if (isset($_POST['return']))header("location:product_add.php");
        } else {
            header("location:404.php");
        }
    } catch (Exception $e) {
        echo $e->getMessage();
       header("location:404.php");
    }
} else {
  header("location:product_add.php");
}
