<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="<?= base_url();?>assets/logo/logo.png" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">LAPORIN</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url();?>assets/admin_lte/dist/img/account.jpg" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Superadmin</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="<?=base_url();?>Dashboard/view_admin" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p class="text">Dashboard</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?=base_url();?>laporin/view_admin/all" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>Pelaporan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?=base_url();?>laporin/view_admin/all" class="nav-link">
                        <i class="nav-icon fas fa-inbox"></i>
                        <p>Laporan Kelas</p>
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon  fas fa-users"></i>
                        <p>
                            Data Laporin
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?=base_url();?>laporin/view_admin/all" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Laporin</p>
                            </a>
                        </li>
                       
                    </ul>
                </li> -->
                <li class="nav-item">
                    <a href="<?=base_url();?>master/data_admin" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Data Master Admin</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?=base_url();?>master/data_profil_superadmin" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Data Profil</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>