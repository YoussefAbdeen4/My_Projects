<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hunter lap</title>
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
<?php
include_once 'nav.php';
include_once '../connect.php';
  try {
      $con = connect();
      $query = 'SELECT *  FROM `products`';
      $stat = $con->prepare($query);
      $stat->execute();
      $products = $stat->fetchAll(PDO::FETCH_ASSOC);
  } catch (Exception $e) {
      header("location:404.php");
      exit();
  }
?>
    <div class="cart-modal">
        <div class="cart-modal-content">
            <span class="close-btn">×</span>
            <h2>سلة التسوق</h2>
            <div class="products"></div>
            <p class="cart-total">الإجمالي: 0 جنيه</p>
            <a href="cart.php" class="checkout-btn">إتمام الشراء</a>
        </div>
    </div>

    <section class="hero">
        <div class="container">
            <h2>مرحبًا بكم في متجرنا الإلكتروني</h2>
            <p>تسوق أفضل اجهزة اللاب توب بأسعار تنافسية وجودة عالية</p>
            <a href="#products" class="shop-btn">تسوق الآن</a>
        </div>
    </section>
    <section id="products" class="products">
        <div class="container">
            <h2>الاجهزة المتوفرة</h2>
            <div class="products-grid">
                <?php
                foreach ($products as $product){
                    if ($product['quantity']==0)$product['status']=0;
                    if ($product['status']==1){
                ?>
                <div class="product-card">
                    <a href="product.php?id=<?= $product['id'] ?>">
                        <img decoding="async" src="images/<?= $product['img'] ?>"
                            alt="Dell Latitude 7480">
                    </a>
                    <h3 class="title"><?= $product['name'] ?></h3>
                    <p class="details"> <?= $product['quantity'] ?> متوفره </p>
                    <span class="price"><?= $product['price'] ?> جنيه</span>
                  <a href="cart_add.php?id=<?= $product['id'] ?>" data-id="<?= $product['id'] ?>" data-price="<?= $product['price'] ?>" data-name="<?= $product['name'] ?>" >أضف إلى
                        السلة
                    </a>
                </div>
                <?php }} ?>
            </div>
        </div>
    </section>
   <?php include_once 'footer.php'?>
</body>

</html>