<?php
include_once 'nav.php';
include_once 'connect.php';
try {
    $con = connect();
    $query = 'select `id`,`name_en`,`img`,`status` ,`price`,`quantity` from `products`';
    $stat = $con->prepare($query);
    $stat->execute();
    $products = $stat->fetchAll(PDO::FETCH_ASSOC);

}catch (Exception $e){
    header("location:404");
}
?>
<section class="pros">
    <h2>Kits</h2>
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

