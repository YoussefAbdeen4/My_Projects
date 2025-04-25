<?php
include_once 'nav.php';
include_once 'connect.php';
$id = $_GET['id'];
try {
    $con = connect();
    $query = 'select `name_en`, `desc_en`,`img` ,`price`,`quantity` from `products` where `id`=:id';
    $stat = $con->prepare($query);
    $stat->bindParam("id",$id,PDO::PARAM_STR);
    $stat->execute();
    $details = $stat->fetchAll(PDO::FETCH_ASSOC);
}catch (Exception $e){
    header("location:404.php");
}
foreach ($details as $data){
    $_SESSION['quantity'] = $data['quantity'];
?>
<section>
    <div class="img">
        <img src="imgs/<?= $data['img']?>" alt="<?= $data['name_en']?>">
        <p><?= $data['name_en'].'   $'. $data['price'] ?> </p>
    </div>
    <div class="bottoms">
        <a href="bayment.php?id=<?=$id?>" class="btt">Buy</a>
        <a href="add_to_cart.php?id=<?=$id?>" class="btt"><img src="imgs/icons8-shopping-cart-32.png" alt="Add to cart"></a>
    </div>
    <div class="desc">
        <p><?= $data['desc_en']?></p>
    </div>
</section>
<?php
}
include_once 'footer.php'
?>