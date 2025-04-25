<?php
session_start();
include_once 'validation.php';
include_once 'connect.php';
$catName=$_POST['name'];
$catImg=$_FILES['img']['name'];
if (validate_category($catName)){
    try {
        $con = connect();
        $query = 'insert into `catigories` (`name_en`,`img`) values (:name,:img)';
        $stat = $con->prepare($query);
        $stat->bindParam(":name",$catName,PDO::PARAM_STR);
        $stat->bindParam(":img",$catImg,PDO::PARAM_STR);
        $stat->execute();
        if ($stat->errorInfo()[2]==null){
            header("location:catigory.php");
        }else {
            header("location:404.php");
        }
    }catch (Exception $e){
        header("location:404.php");
    }
}else {
    $_SESSION['cat-name'] = $catName;
}