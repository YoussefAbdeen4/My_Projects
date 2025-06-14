<?php
session_start();
include_once '../validation.php';
include_once '../connect.php';
$id = $_GET['id'];//user
$status = 0;
    try {
        $con = connect();
        $query = 'UPDATE `users` set `status`=:status where id=:id';
        $stat = $con->prepare($query);
        $stat->bindParam("status", $status, PDO::PARAM_STR);
        $stat->bindParam("id", $id, PDO::PARAM_STR);
        $stat->execute();
        if ($stat->errorInfo()[2] == null) {
            header("location:users_view.php");
        } else {
            header("location:404.php");
        }
    } catch (Exception $e) {
        echo $e->getMessage();
        header("location:404.php");
    }
