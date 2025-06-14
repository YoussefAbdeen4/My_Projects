<?php
session_start();
include_once '../connect.php';
$id = $_GET['id'];
try {
    $con = connect();
    $query = 'DELETE FROM `products` WHERE `id` = :id';
    $stat = $con->prepare($query);
    $stat->bindParam("id", $id, PDO::PARAM_STR);
    $stat->execute();
    if ($stat->errorInfo()[2] == null) {
        header("location: product_view.php?");
    } else {
        header("location: 404.php");
    }
} catch (Exception $e) {
    //echo $e->getMessage();
    header("location: 404.php");
}

