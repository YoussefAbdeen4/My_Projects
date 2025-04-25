<?php
include_once 'nav.php';
include_once 'auth.php';
if (isset($_GET['id'])){
    $_SESSION['product_id']=$_GET['id'];
}
?>
<div class="row">
    <div class="col-75">
        <div class="container">
            <form action="make_order.php" method="post">

                <div class="row">
                    <div class="col-50">
                        <h3>Billing Address</h3>
                        <input type="hidden"  name="user_id" value="<?= $_SESSION['id'] ?>" >
                        <input type="hidden"  name="product_id" value="<?= $_SESSION['product_id'] ?>"  >
                        <label for="email"><i class="fa fa-envelope"></i> Email</label>
                        <input type="text" id="email" name="email" placeholder="john@example.com" required>
                        <p style="background-color: #dedcdc; color: #b00202"><small><?php if (isset($_SESSION['email-error'] ))echo $_SESSION['email-error'] ; unset($_SESSION['email-error'] )?></small></p>
                        <label for="phone"><i class="fa fa-user"></i> Full Name</label>
                        <input type="text" id="phone" name="phone" placeholder="ex: +20 1203226858" required>
                        <p style="background-color: #cbc6c6; color: #b00202"><small><?php if (isset( $_SESSION['phone-error'])) echo $_SESSION['phone-error'];unset( $_SESSION['phone-error']) ?></small></p>
                        <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                        <input type="text" id="adr" name="address" placeholder="city/542 W. 15th Street" required>
                        <p style="background-color: #e0dede; color: #b00202"><small><?php if (isset($_SESSION['add-error'] )) echo $_SESSION['add-error'] ;unset( $_SESSION['add-error'] ) ?></small></p>


                    <div class="col-50">
                        <h3>Payment</h3>
                        <label for="fname">Accepted Cards</label>
                        <div class="icon-container">
                            <i class="fa fa-cc-visa" style="color:navy;"></i>
                            <i class="fa fa-cc-amex" style="color:blue;"></i>
                            <i class="fa fa-cc-mastercard" style="color:red;"></i>
                            <i class="fa fa-cc-discover" style="color:orange;"></i>
                        </div>
                        <label for="ccnum">Credit card number</label>
                        <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444" required>
                            <p style="background-color: #dad9d9; color: #b00202"><small><?php if (isset( $_SESSION['credit_card-error'] )) echo $_SESSION['credit_card-error'] ;unset( $_SESSION['credit_card-error'] )?></small></p>
                        </div>
                </div>
                <input type="submit" value="Continue to checkout" class="btn">
            </form>
        </div>
    </div>
</div>