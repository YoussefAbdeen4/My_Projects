<?php include_once 'nav.php' ?>
    <section class="page-form">
        <h2>Add New Category</h2>
        <form class="Login" method="post" action="add_catigory.php" enctype="multipart/form-data">
            <div class="input">
                <label for="cat">Category Name</label>
                <input type="text" placeholder="Category Name" name="name" id="cat" required value="<?php if (isset($_SESSION['cat-name']))echo $_SESSION['cat-name'];unset($_SESSION['cat-name']) ?>">
            </div>
            <?php
            if (isset($_SESSION['category-error']))echo '<div class="alert alert-danger" role="alert">'.$_SESSION['category-error'].'</div>';
            unset($_SESSION['category-error']);
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