<?php
session_start();
include_once 'validation.php';
include_once 'connect.php';
$sub_catName=$_POST['name'];
$sub_catImg=$_FILES['img']['name'];
$category_id = $_SESSION['cat-id'];
if (validate_category($sub_catName)){
    try {
        $con = connect();
        $query = 'insert into `subcatigories` (`name_en`,`img`,`catigory_id`) values (:name,:img,:category_id)';
        $stat = $con->prepare($query);
        $stat->bindParam(":name",$sub_catName,PDO::PARAM_STR);
        $stat->bindParam(":img",$sub_catImg,PDO::PARAM_STR);
        $stat->bindParam(":category_id",$category_id,PDO::PARAM_STR);
        $stat->execute();
        if ($stat->errorInfo()[2]==null){
            header("location:subcatigory.php");
        }else {
            header("location:404.php");
        }
    }catch (Exception $e){
        echo '<br>'.$e->getMessage();
        header("location:404.php");
    }
}else {
    $_SESSION['cat-name'] = $sub_catName;
    header("location:new_subcategory.php");
}