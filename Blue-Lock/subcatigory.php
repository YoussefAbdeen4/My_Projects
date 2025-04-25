<?php
include_once 'nav.php';
include_once 'connect.php';
if (isset($_GET['id'])){
    $_SESSION['cat-id']=$_GET['id'];
}
$cat_id = $_SESSION['cat-id'];
try {
    $con = connect();
    $query = 'select `id`,`name_en`,`img`,`status` from `subcatigories` where `catigory_id`=:cat_id';
    $stat = $con->prepare($query);
    $stat->bindParam("cat_id",$cat_id,PDO::PARAM_STR);
    $stat->execute();
    $sup_cats = $stat->fetchAll(PDO::FETCH_ASSOC);
}catch (Exception $e){
    header("location:404");
}
?>
<section class="cats">
    <h2>Clubs</h2>
    <?php
    if (isset($_SESSION['id']) and $_SESSION['id']==1){
        ?>
        <div class="add-cat">
            <a href="new_subcategory.php">
                <img src="imgs/icons8-add-100.png" alt="Add new category">
                <p>Add new category</p>
            </a>
        </div>
        <?php
    }
    ?>
   <div class="subcategories-container">
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
   </div>
</section>
<?php include_once 'footer.php'?>

