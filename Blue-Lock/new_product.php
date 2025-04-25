<?php include_once 'nav.php' ;
?>
<section class="page-form">
    <h2>Add New Product</h2>
    <form class="Login" method="post" action="add_product.php" enctype="multipart/form-data">
        <div class="input">
            <label for="pro_n">Product Name</label>
            <input type="text" placeholder="Subcategory Name" name="name" id="pro_n" required value="<?php if (isset($_SESSION['pro-name']))echo $_SESSION['pro-name'];unset($_SESSION['pro-name']) ?>">
        </div>
        <?php
        if (isset($_SESSION['name-error']))echo '<div class="alert alert-danger" role="alert">'.$_SESSION['name-error'].'</div>';
        unset($_SESSION['name-error']);
        ?>
        <div class="input">
            <label for="price">Price</label>
            <input type="number" placeholder="Price" name="price" id="price" required value="<?php if (isset($_SESSION['price']))echo $_SESSION['price'];unset($_SESSION['price']) ?>">
        </div>
        <?php
        if (isset($_SESSION['price-error']))echo '<div class="alert alert-danger" role="alert">'.$_SESSION['price-error'].'</div>';
        unset($_SESSION['price-error']);
        ?>
        <div class="input">
            <label for="q">Quantity</label>
            <input type="number" placeholder="Quantity" name="quantity" id="q" required value="<?php if (isset($_SESSION['quantity']))echo $_SESSION['quantity'];unset($_SESSION['quantity']) ?>">
        </div>
        <?php
        if (isset($_SESSION['quantity-error']))echo '<div class="alert alert-danger" role="alert">'.$_SESSION['quantity-error'].'</div>';
        unset($_SESSION['quantity-error']);
        ?>
        <div class="input">
            <label for="desc">Description</label>
            <input type="text" placeholder="Description" name="desc" id="desc" required value="<?php if (isset($_SESSION['desc']))echo $_SESSION['desc'];unset($_SESSION['desc']) ?>">
        </div>
        <?php
        if (isset($_SESSION['desc-error']))echo '<div class="alert alert-danger" role="alert">'.$_SESSION['desc-error'].'</div>';
        unset($_SESSION['desc-error']);
        ?>
        <div class="input">
            <label for="img">Image</label>
            <input type="file" name="img" id="img">
        </div>
        <div class="input">
            <input type="submit" name="register" value="Add Category">
        </div>
    </form>
</section>
<?php include_once 'footer.php';?>
