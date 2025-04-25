<?php
include_once 'nav.php';
include_once 'connect.php';

try {
    $con= connect();
    $productQuery = 'select `id`,`name_en`,`img`,`status` from `products`';
    $subcategoryQuery = 'select `id`,`name_en`,`img`,`status` from `subcatigories`';
    $categoryQuery = 'select `id`,`name_en`,`img`,`status` from `catigories`';
    $productStat = $con->prepare($productQuery);
    $productStat->execute();
    $products = $productStat->fetchAll(PDO::FETCH_ASSOC);
    $subcategoryStat = $con->prepare($subcategoryQuery);
    $subcategoryStat->execute();
    $subcategories = $subcategoryStat->fetchAll(PDO::FETCH_ASSOC);
    $categoryStat = $con->prepare($categoryQuery);
    $categoryStat->execute();
    $categories = $categoryStat->fetchAll(PDO::FETCH_ASSOC);
}catch (Exception $e){
    header("location:404.php");
}
?>
<a href="kits.php" class="bttn">Go to products page</a>
<div class="products-container">
    <?php
    foreach ($products as $product){
    if ($product['status']==1){
    ?>
    <div class="product">
        <a href="product_details.php?id=<?= $product['id']?>">
            <img src="imgs/<?= $product['img']?>" alt="<?= $product['name_en']?>">
            <p class="product-name"><?= $product['name_en']?></p>
        </a>
    </div>
    <?php }}?>
</div>
<a href="clubs.php" class="bttn">Go to subcategories page</a>
<div class="subcategories-container">
    <?php
    foreach ($subcategories as $subcategory){
        if ($subcategory['status']==1){
    ?>
    <div class="subcategory">
        <a href="product.php?id=<?= $subcategory['id']?>">
            <img src="imgs/<?= $subcategory['img']?>" alt="<?= $subcategory['name_en']?>">
            <p class="subcategory-name"><?= $subcategory['name_en']?></p>
        </a>
    </div>
    <?php }} ?>
</div>

<div class="category-container">
   <?php foreach ($categories as $category){
    if ($category['status']==1){
    ?>
    <div class="category">
        <a href="subcatigory.php?id=<?= $category['id']?>">
            <img src="imgs/<?= $category['img']?>" alt="<?= $category['name_en']?>">
            <p class="category-name"><?= $category['name_en']?></p>
        </a>
    </div>
    <?php }} ?>
</div>

<script>
    const subcategoriesContainer = document.querySelector('.subcategories-container');
    const subcategories = document.querySelectorAll('.subcategory');
    let currentIndex = 0;

    function showNextSubcategory() {
        currentIndex = (currentIndex + 1) % subcategories.length;
        subcategoriesContainer.scrollTo({
            left: currentIndex * window.innerWidth,
            behavior: 'smooth'
        });
    }

    setInterval(showNextSubcategory, 8000);

    const productsContainer = document.querySelector('.products-container');
    const products = document.querySelectorAll('.product');
    let productIndex = 0;

    function showNextProduct() {
        productIndex = (productIndex + 1) % products.length;
        productsContainer.scrollTo({
            left: productIndex * window.innerWidth,
            behavior: 'smooth'
        });
    }

    setInterval(showNextProduct, 4000);
</script>

<?php
include_once 'footer.php';
?>
