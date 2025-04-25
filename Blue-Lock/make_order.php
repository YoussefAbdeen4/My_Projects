<?php
session_start();
include_once 'validation.php';
include_once 'connect.php';
$user_id = $_POST['user_id'];
$product_id = $_POST['product_id'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$add = $_POST['address'];
$card_number = $_POST['cardnumber'];
$_SESSION['quantity'] = $_SESSION['quantity']-1;

if (validate_bayment($email,$phone,$add,$card_number)){
    try {
        $con = connect();
        $query = 'insert into `orders` (`user_id`,`product_id`,`user_email`,`user_phone`,`user_address`) values (:user_id,:product_id,:email,:phone,:add)';
        $stat = $con->prepare($query);
        $stat->bindParam("user_id",$user_id,PDO::PARAM_STR);
        $stat->bindParam("product_id",$product_id,PDO::PARAM_STR);
        $stat->bindParam("email",$email,PDO::PARAM_STR);
        $stat->bindParam("phone",$phone,PDO::PARAM_STR);
        $stat->bindParam("add",$add,PDO::PARAM_STR);
        $stat->execute();
        if ($stat->errorInfo()[2]==null){
            $query = 'update `products` set `quantity`=:quantity where id=:id';
            $stat = $con->prepare($query);
            $stat->bindParam("quantity",$_SESSION['quantity'],PDO::PARAM_STR);
            $stat->bindParam("id",$product_id,PDO::PARAM_STR);
            $stat->execute();
        }else {
            header("location:404.php");
        }
    }catch (Exception $e){
        header("location:404.php");
    }
}else {
header("location:bayment.php");
}

//session_start();
//if (empty($_SESSION['err'])){
//    //echo 404;
//    print_r($_SESSION);
//    header("location:index.php");
//    //die;
//}
//else {
//    unset($_SESSION['err']);
//}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #031dae;
            color: #333;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            text-align: center;
        }

        h1 {
            font-size: 6rem;
            color: #ffffff;
            animation: pulse 1.5s infinite;
        }

        h2 {
            font-size: 1.5rem;
            margin-bottom: 20px;
            color: #040000;
        }

        .home-btn {
            padding: 10px 20px;
            font-size: 1rem;
            color: white;
            background-color: #030b53;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .home-btn:hover {
            background-color: #040000;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.1);
            }
            100% {
                transform: scale(1);
            }
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Check out done successfully</h1>
    <h2>Order will arrived you in 24h</h2>
    <button class="home-btn" onclick="goHome()">Go Back Home</button>
</div>

<script>
    function goHome() {
        // Replace 'index.html' with the path to your home page
        window.location.href = 'index.php';
    }
</script>

</body>
</html>
