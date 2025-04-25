<?php
session_start();
include_once 'validation.php';
include_once 'connect.php';
$name = $_POST['name'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];
$desc = $_POST['desc'];
$img = $_FILES['img']['name'];
$sub_cat_id = $_SESSION['sub_cat-id'];
if (validate_product($name,$desc,$quantity,$price)){
    try {
        $con = connect();
        $query = 'insert into `products` (`name_en`,`price`,`img`,`desc_en`,`quantity`,`subcatigory_id`) values (:name,:price,:img,:desc,:quantity,:sub_cat_id)';
        $stat = $con->prepare($query);
        $stat->bindParam("name",$name,PDO::PARAM_STR);
        $stat->bindParam("price",$price,PDO::PARAM_STR);
        $stat->bindParam("img",$img,PDO::PARAM_STR);
        $stat->bindParam("desc",$desc,PDO::PARAM_STR);
        $stat->bindParam("quantity",$quantity,PDO::PARAM_STR);
        $stat->bindParam("sub_cat_id",$sub_cat_id,PDO::PARAM_STR);
        $stat->execute();
        if ($stat->errorInfo()[2]==null){
        header("location:product.php");
    }else {
            header("location:404.php");
        }
    }catch (Exception $e){
        header("location:404.php");
    }
}else {
    $_SESSION['pro-name']=$name;
    $_SESSION['price']=$price;
    $_SESSION['quantity']=$quantity;
    $_SESSION['desc']=$desc;
    header("location:new_product.php");
}
