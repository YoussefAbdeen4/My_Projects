<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>وصف المنتج - Hunter lap</title>
  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
  <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <!-- Navbar -->

  <?php
  /*
  GET => URL --> LINK , FORM
  POST => FORM 
  REQUEST ==> GET, POST 
  */ 
  include_once 'nav.php';
  include_once '../connect.php';
  $id=$_GET['id'];
  try {
      $con = connect();
      $query = 'SELECT *  FROM `products` where `id`=:id';
      $stat = $con->prepare($query);
      $stat->bindParam(":id",$id,PDO::PARAM_STR);
      $stat->execute();
      $product = $stat->fetchObject();

  } catch (Exception $e) {
      header("location:404.php");
      exit();
  }
  ?>
  <!-- Cart Modal -->
  <div class="cart-modal">
    <div class="cart-modal-content">
      <span class="close-btn">×</span>
      <h2>سلة التسوق</h2>
      <div class="products"></div>
      <p class="cart-total">الإجمالي: 0 جنيه</p>
      <a href="cart.php" class="checkout-btn">إتمام الشراء</a>
    </div>
  </div>
  <!-- Product Section -->
  <section class="product">
    <div class="container">
      <div class="product-image">
        <img src="images/<?= $product->img ?>" alt="صورة المنتج">
      </div>
      <div class="product-details">
        <h2 id="product-name"><?= $product->name ?></h2>
        <p class="price" id="product-price"><?= $product->price ?> جنيه</p>
          <p class="price" id="product-price"><?= $product->quantity ?> متوفره </p>
        <p class="description" id="product-description"><?= $product->desc ?></p>
        <div class="action-buttons">
          <form action="cart_add.php" method="post">
              <input type="hidden" name="id" value="<?= $product->id ?>">
              <button class="add-to-cart-btn">أضف إلى السلة</button>
          </form>
            <form action="checkout.php" method="post">
                <input type="hidden" name="id" value="<?= $product->id ?>">
                <input type="hidden" name="price" value="<?= $product->price ?>">
                <input type="hidden" name="quantity" value="<?= $product->quantity ?>">
                <button class="add-to-cart-btn">شراء المنتج</button>
            </form>
        </div>
      </div>
    </div>
  </section>
  <!-- Footer -->
  <footer>
      <div class="container">
          <p>© 2025 متجرنا الإلكتروني. جميع الحقوق محفوظة.</p>
      </div>
  </footer>
  <script src="Js/product.js"></script>
</body>

</html>