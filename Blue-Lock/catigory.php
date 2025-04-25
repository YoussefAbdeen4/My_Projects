<?php
include_once 'nav.php';
include_once 'connect.php';
try {
    $con = connect();
    $query = 'select `id`,`name_en`,`img`,`status` from `catigories`';
    $stat = $con->prepare($query);
    $stat->execute();
    $cats = $stat->fetchAll(PDO::FETCH_ASSOC);
}catch (Exception $e){
    header("location:404");
}
?>
<section class="cats">
    <h2>Leagues</h2>
    <?php
    if (isset($_SESSION['id']) and $_SESSION['id']==1){
    ?>
    <div class="add-cat">
        <a href="new_catigory.php">
            <img src="imgs/icons8-add-100.png" alt="Add new category">
            <p>Add new category</p>
        </a>
    </div>
    <?php
    }
    ?>
    <div class="categories-container">
        <?php
        foreach ($cats as $cat){
            if ($cat['status']==1){
                echo "
     <div class='cat'>
        <a href='subcatigory.php?id={$cat['id']}'>
            <img src='imgs/". $cat['img']."'alt='Add new category'>
            <p>".$cat['name_en']."</p>
        </a>
    </div>
     ";
            }
        }
        ?>
    </div>

</section>
<?php include_once 'footer.php'?>

