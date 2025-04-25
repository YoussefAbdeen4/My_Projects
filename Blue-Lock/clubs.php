<?php
include_once 'nav.php';
include_once 'connect.php';
try {
    $con = connect();
    $query = 'select `id`,`name_en`,`img`,`status` from `subcatigories`';
    $stat = $con->prepare($query);
    $stat->execute();
    $sup_cats = $stat->fetchAll(PDO::FETCH_ASSOC);
}catch (Exception $e){
    header("location:404");
}
?>

    <?php
    foreach ($sup_cats as $sup_cat){
        if ($sup_cat['status']==1){
            echo "
     <div class='cat'>
        <a href='product.php?id={$sup_cat['id']}'>
            <img src='imgs/". $sup_cat['img']."'alt='subcategory'>
            <p>".$sup_cat['name_en']."</p>
        </a>
    </div>
     ";
        }
    }
    ?>
</section>
<?php include_once 'footer.php'?>

