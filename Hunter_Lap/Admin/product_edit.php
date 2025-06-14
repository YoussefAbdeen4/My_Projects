<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>تعديل المنجات</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    <?php
    session_start();
    include_once 'nav-slider.php';
    include_once '../connect.php';
    $id = $_GET['id'];
    try {
        $con = connect();
        $query = 'SELECT *  FROM `products` where id=:id';
        $stat = $con->prepare($query);
        $stat->bindParam("id",$id,PDO::PARAM_STR);
        $stat->execute();
        $product = $stat->fetchAll(PDO::FETCH_ASSOC);
        //print_r($product);
    } catch (Exception $e) {
        header("location:../404.php");
        exit();
    }
    ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>تعديل المنتج</h1>
                    </div>
                    <div class="col-sm-6">
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <div class="card-body">
            <form method="post" action="product_update.php" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $product[0]['id'] ?>">
                <div class="form-group">
                    <label for="inputName">اسم المتنج</label>
                    <input type="text" id="inputName" class="form-control" name="name" required value="<?= $product[0]['name'] ?>">
                </div>
                <div class="form-group">
                    <label for="inputDescription">وصف المنتج</label>
                    <textarea id="inputDescription" class="form-control" rows="4" name="desc" required ><?= $product[0]['desc'] ?></textarea>
                </div>
                <div class="form-group">
                    <label for="inputName">سعر المنتج</label>
                    <input type="number" id="inputName" class="form-control" name="price" value="<?= $product[0]['price'] ?>">
                </div>
                <div class="form-group">
                    <label for="inputName">كميه المنتج</label>
                    <input type="number" id="inputName" class="form-control" name="quantity" value="<?= $product[0]['quantity'] ?>">
                </div>
                <div class="form-group">
                    <label for="inputStatus">حاله المنتج</label>
                    <select id="inputStatus" class="form-control custom-select" name="status" >
                        <option value="1">نشط</option>
                        <option value="2">غير نشط</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="inputName">صوره المنتج</label>
                    <input type="file" id="myFile" name="img">
                </div>
                <div class="form-group">
                    <input type="submit" value="تعديل" class="btn btn-success float-left" name="add">
                </div>
            </form>
        </div>
    </div>
    <!-- ./wrapper -->
    <?php include_once 'footer.php';?>
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
</body>
</html>
