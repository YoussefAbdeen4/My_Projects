<?php
include_once 'nav.php';
include_once 'auth.php';
include_once 'connect.php';
$id=$_SESSION['id'];
try {
    $con=connect();
    $query = 'SELECT p.id,p.name_en,p.price FROM carts c INNER JOIN products p ON c.product_id = p.id WHERE c.user_id=:id';
    $stat =$con->prepare($query);
    $stat->bindParam("id",$id,PDO::PARAM_STR);
    $stat->execute();
    $data=$stat->fetchAll(PDO::FETCH_ASSOC);
}catch (Exception $e){
    header("location:404.php");
}
?>

<div class="col-25">
    <div class="container">
        <h2>Cart</h2>
        <table>
        <?php
        foreach ($data as $item){
        ?>
            <tr>
                <td>
                    <a href="product_details.php?id=<?= $item['id']?>"><?= $item['name_en']?></a>
                </td>
                <td>
                    <span class="price">$<?= $item['price']?></span>
                </td>
                <td>
                    <a style="color: white;background-color: red; box-shadow: #4a4a4a" class="btn" href="delete_from_catrt.php?id=<?= $item['id']?>">Delete</a>
                </td>
            </tr>
        <?php }?>
        </table>
    </div>
</div>
<?php
if (isset($_GET['err'])){
    echo "<p style='text-align: center; color: white; background-color: red'>{$_GET['err']}</p>";
    unset($_GET['err']);
}
