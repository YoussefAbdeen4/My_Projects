<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>اضافه منتج</title>

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
  include_once 'nav-slider.php'
  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>اضافه منتج</h1>
          </div>
          <div class="col-sm-6">
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
      <div class="card-body">
          <form method="post" action="product_new.php" enctype="multipart/form-data">
              <div class="form-group">
                  <label for="inputName">اسم المتنج</label>
                  <input type="text" id="inputName" class="form-control" name="name" required>
              </div>
              <div class="form-group">
                  <label for="inputDescription">وصف المنتج</label>
                  <textarea id="inputDescription" class="form-control" rows="4" name="desc" required></textarea>
              </div>
              <div class="form-group">
                  <label for="inputName">سعر المنتج</label>
                  <input type="number" id="inputName" class="form-control" name="price">
              </div>
              <div class="form-group">
                  <label for="inputName">كميه المنتج</label>
                  <input type="number" id="inputName" class="form-control" name="quantity">
              </div>
              <div class="form-group">
                  <label for="inputStatus">حاله المنتج</label>
                  <select id="inputStatus" class="form-control custom-select" name="status">
                      <option value="1">نشط</option>
                      <option value="2">غير نشط</option>
                  </select>
              </div>
              <div class="form-group">
                  <label for="inputName">صوره المنتج</label>
                  <input type="file" id="myFile" name="img">
              </div>
              <div class="form-group">
                  <input type="submit" value="اضافه هذا المنتج" class="btn btn-success float-left" name="add">
                  <input type="submit" value="اضافه منتج اخر" class="btn btn-success float-right" name="return">
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
