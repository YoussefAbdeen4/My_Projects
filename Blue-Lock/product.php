<?php
include_once 'nav.php';
include_once 'connect.php';
if (isset($_GET['id'])){
    $_SESSION['sub_cat-id']=$_GET['id'];
}
$sub_cat_id = $_SESSION['sub_cat-id'];
try {
    $con = connect();
        $query = 'select `id`,`name_en`,`img`,`status` ,`price`,`quantity` from `products` where `subcatigory_id`=:sub_cat_id';
        $stat = $con->prepare($query);
        $stat->bindParam("sub_cat_id",$sub_cat_id,PDO::PARAM_STR);
    $stat->execute();
    $products = $stat->fetchAll(PDO::FETCH_ASSOC);

}catch (Exception $e){
    header("location:404");
}
?>
<section class="pros">
    <h2>Kits</h2>
    <?php
    if (isset($_SESSION['id']) and $_SESSION['id']==1){
        ?>
        <div class="add-pro">
            <a href="new_product.php">
                <img src="imgs/icons8-add-100.png" alt="Add new category">
                <p>Add new Product</p>
            </a>
        </div>
        <?php
    }
    ?>
    <div class="pro-container">
        <?php
        foreach ($products as $product){
            if ($product['status']==1){
                echo "
     <div class='pro'>
        <a href='product_details.php?id={$product['id']}'>
            <img src='imgs/". $product['img']."'alt='subcategory'>
            <p>".$product['name_en']."</p>
        </a>
       <p><small>$".$product['price']."&nbsp;&nbsp;&nbsp;&nbsp;".$product['quantity']." pecies avilable</small></p>
    </div>
     ";
            }
        }
        ?>
    </div>
</section>
<?php include_once 'footer.php'?>

