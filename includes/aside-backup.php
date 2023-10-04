<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.php" class="brand-link">
        <img src="<?= site_url ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><?= website_title ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= site_url ?>dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= $username ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?= site_url ?>" class="nav-link active">
                        <i class="fas fa-home nav-icon"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <?php if ($role == 'admin') { ?>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon far fa-circle text-danger"></i>
                            <p>
                                Admin Panel
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="#<?= site_url ?>forms/" class="nav-link">
                                    <i class=""></i>
                                    <p>Admin Services</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url ?>forms/pet-sitter.php" class="nav-link">
                                    <i class=""></i>
                                    <p>Pet Sitter</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#<?= site_url ?>forms/" class="nav-link">
                                    <i class=""></i>
                                    <p>Pet Owner</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class=""></i>
                                    <p>View Services</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class=""></i>
                                    <p>Accounts</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                <?php } ?>
                <?php if($role == 'sitter') { ?>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tree"></i>
                        <p>
                            Pet Sitter
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= site_url ?>forms/pet-sitter.php" class="nav-link">
                                <i class=""></i>
                                <p>Services (Add/View/Delete)</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= site_url ?>forms/sitter-services-list.php" class="nav-link">
                                <i class=""></i>
                                <p>Accept/Reject service request</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class=""></i>
                                <p>View Services (Active/Inactive)</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class=""></i>
                                <p>View Transactions</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php } ?>
                <?php if($role == 'owner') { ?>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tree"></i>
                        <p>
                            Pet Owner
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?=site_url?>forms/book-a-service.php" class="nav-link">
                                <i class=""></i>
                                <p>Book a service for your Pet</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class=""></i>
                                <p>View previous services availed</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class=""></i>
                                <p>View Transactions</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php } ?>

                <?php if ($role == 'admin') { ?>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon far fa-circle text-info"></i>
                            <p>Register new Pet Owner</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon far fa-circle text-info"></i>
                            <p>Register new Pet Sitter</p>
                        </a>
                    </li>
                <?php } ?>

                <li class="nav-item">
                    <a href="<?= site_url ?>logout.php" class="nav-link">
                        <i class="nav-icon far fa-circle text-info"></i>
                        <p>Logout</p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>