<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>سلة التسوق - Hunter lap</title>
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>

    </style>
</head>

<body>
<?php
include_once 'nav.php';
include_once 'auth.php';
include_once '../connect.php';
$id=$_SESSION['user-id'];
/*
table super -> cart 
sub -> (forigen key)
*/
try {
    $con = connect();
    $query = 'SELECT
    c.product_id as product_id,
    p.name AS product_name,
    p.quantity as product_quantity,
    c.quantity AS quantity,
    (c.quantity * p.price) AS price
FROM
    carts c
JOIN
    products p ON c.product_id = p.id
WHERE
    c.user_id = :user_id;';
    $stat = $con->prepare($query);
    $stat->bindParam(":user_id",$id,PDO::PARAM_STR);
    $stat->execute();
    $products = $stat->fetchAll(PDO::FETCH_ASSOC);

} catch (Exception $e) {
    echo $e->getMessage();
    ///header("location:404.php");
    exit();
}
?>

    <section class="cart">
        <div class="container">
            <h2>سلة التسوق</h2>
            <?php
            $sum=0;
            foreach ($products as $product){
                $sum+=$product['price'];

                ?>
            <div class="cart-items">
                    <p ><?= $product['product_name'] ?></p>
                    <p > الكميه :  <?= $product['quantity'] ?></p>
                    <p ><?= $product['price'] ?> جنيه </p>
                <a href="checkout.php?id=<?= $product['product_id'] ?>&price=<?= $product['price'] ?>&quantity=<?= $product['product_quantity'] ?>&cart_quantity=<?= $product['quantity']?>" class="checkout-btn" style="float: left; margin: 2px" > إتمام الشراء</a>
                <a href="cart_delete.php?id=<?= $product['product_id'] ?>" class="checkout-btn" style="float: left; background-color: red;margin: 2px" > حذف المنتج</a>
            </div>
            <?php } ?>
            <p class="cart-total">الإجمالي: <?= $sum ?> جنيه</p>

        </div>
    </section>

    <footer class="fixed-footer">
        <div class="container">
            <p>© 2025 متجرنا الإلكتروني. جميع الحقوق محفوظة.</p>
        </div>
    </footer>

    <script src="Js/cart.js"></script>
</body>

</html>