<html lang="ar" dir="rtl">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>إتمام الشراء | Hunter lap</title>
  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
  <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <!-- Navbar -->
  <?php
  include_once 'nav.php';
  include_once 'auth.php';
  $product_id = $_REQUEST['id'];
  $price=$_REQUEST['price'];
  $quantity=$_REQUEST['quantity'];
  $cart_quantity = 1;
  if (isset($_GET['cart_quantity'])){
      $cart_quantity = $_GET['cart_quantity'];
  }
  $user_id=$_SESSION['user-id'];
  ?>
  <!-- Checkout Section -->
  <section class="checkout">
    <div class="container">
      <div class="checkout-form">
        <h2>الدفع</h2>
        <form action="order_add.php" method="post">
            <input type="hidden" name="user-id" value="<?= $user_id ?>">
            <input type="hidden" name="product-id" value="<?= $product_id ?>">
            <input type="hidden" name="price" value="<?= $price ?>">
            <input type="hidden" name="quantity" value="<?= $quantity ?>">
            <input type="hidden" name="cart_quantity" value="<?= $cart_quantity ?>">
          <label for="email">الإيميل</label>
          <input type="email" id="email" name="email" required placeholder="ex@example.exa">
          <label for="address">العنوان</label>
          <input type="text" id="address" name="address" required placeholder="المحافظة / المركز">
          <label for="phone">رقم الهاتف</label>
          <input type="tel" id="phone" name="phone" required placeholder="0123 456 7891">
          <label for="payment">طريقة الدفع</label>
          <input type="text" id="payment" name="payment" required placeholder="1234 5678 9012 3456">
          <button type="submit" class="confirm-btn">تأكيد الشراء</button>
        </form>
      </div>

      <div class="cart-summary">
        <h2>ملخص السلة</h2>
        <!--<div class="cart-items"></div>-->
        <p class="cart-total">الإجمالي: <?= $price ?> جنيه</p>
      </div>
    </div>

  </section>
  <!-- Footer -->
  <footer class="fixed-footer">
    <div class="container">
      <p>© 2025 متجرنا الإلكتروني. جميع الحقوق محفوظة.</p>
    </div>
  </footer>
  <script src="Js/checkout.js"></script>
</body>

</html>