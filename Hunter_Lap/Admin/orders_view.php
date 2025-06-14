<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>قائمه الطلبات</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <?php
  include_once '../connect.php';
  include_once 'nav-slider.php';
  try {
      $con = connect();
      $query = "
        SELECT
            o.*,
            u.full_name AS user_name,
            p.name AS product_name
        FROM
            orders AS o
        JOIN
            users AS u ON o.user_id = u.id
        JOIN
            products AS p ON o.product_id = p.id
    ";
      $stat = $con->prepare($query);
      $stat->execute();
      $orders = $stat->fetchAll(PDO::FETCH_ASSOC);
//      echo '<pre>';
//      print_r($orders);
//      echo '</pre>';
  }catch (Exception $e){
      header("location:404.php");
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
            <h1>قائمه الطلبات</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
              <!-- /.card -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">جدول عرض الطلبات</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                      <th>رقم الطلب</th>
                      <th>رقم المنتج</th>
                      <th>اسم المنتج</th>
                      <th>رقم المستخدم</th>
                      <th>اسم المستخدم</th>
                      <th>إيميل المستخدم</th>
                      <th>رقم هاتف المستخدم</th>
                      <th>المبلغ الكلى للطلب</th>
                      <th>تاريخ الطلب</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  foreach ($orders as $order){
                      ?>
                      <tr>
                          <td><?= $order['order_id'] ?></td>
                          <td><?= $order['product_id'] ?></td>
                          <td><?= $order['product_name'] ?></td>
                          <td><?= $order['user_id'] ?></td>
                          <td><?= $order['user_name']?></td>
                          <td><?= $order['user_email']?></td>
                          <td><?= $order['user_phone']?></td>
                          <td><?= $order['total_price']?></td>
                          <td><?= $order['created_at'] ?></td>
                      </tr>
                      <?php
                  }
                  ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include_once 'footer.php'?>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
