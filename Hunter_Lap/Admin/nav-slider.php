
<!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="../User/index.php" class="nav-link">الصفحة الرئيسيه</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="../User/contact-us.php" class="nav-link">تواصل معنا</a>
            </li>
        </ul>

        <!-- Right navbar links -->
    </nav>
    <!-- /.navbar -->
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
        <img src="../User/images/favicon.ico" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Hunter lap</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="index.php" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            لوحه التحكم
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            المنتجات
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="product_view.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>قائمه المنتجات</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="product_add.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>اضافه منتج</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            المستخدمين
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="users_view.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>قائمه المستخدمين</p>
                                    </a>
                                </li>
                            </ul
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-circle"></i>
                        <p>
                            الطلبات
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <a href="orders_view.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>عرض الطلبات</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-envelope"></i>
                        <p>
                            الرسائل
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <a href="massages_view.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>عرض رسائل المستخدمين</p>
                            </a>
                        </li>
                    </ul>
                </li>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
