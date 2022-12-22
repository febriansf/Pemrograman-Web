                        <!-- Navbar -->
                        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                            <!-- Left navbar links -->
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                                </li>
                            </ul>

                            <!-- Right navbar links -->
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item">
                                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                                        <i class="fas fa-expand-arrows-alt"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                        <!-- /.navbar -->
                        <!-- Main Sidebar Container -->
                        <aside class="main-sidebar sidebar-dark-primary elevation-4">
                            <!-- Brand Logo -->
                            <a href="index3.html" class="brand-link">
                                <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                                <span class="brand-text font-weight-light">AdminLTE 3</span>
                            </a>
                            <!-- Sidebar -->
                            <div class="sidebar">
                                <!-- Sidebar user panel (optional) -->
                                <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                            <div class="image">
                                <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                            </div>
                            <div class="info">
                                <a href="#" class="d-block">name</a>
                            </div>
                        </div> -->

                                <!-- Sidebar Menu -->
                                <nav class="mt-2">
                                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                                        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                                        <li class="nav-item">
                                            <a href="javascript:void(0);" class="nav-link p-0">
                                                <div class="user-panel pb-3 d-flex">
                                                    <div class="image">
                                                        <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                                                    </div>
                                                    <div class="info">
                                                        Admin
                                                        <i class="text-right fas fa-angle-right"></i>
                                                    </div>
                                                </div>
                                            </a>
                                            <ul class="nav nav-treeview text-sm">
                                                <li class="nav-item">
                                                    <a href="/admin/index.php?logout=y" class="nav-link">
                                                        <i class="nav-icon fas fa-sign-out-alt fa-sm"></i>
                                                        <p> Log out</p>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="/index.php" class="nav-link">
                                                        <i class="nav-icon fas fa-door-open fa-sm"></i>
                                                        <p> Landing Page</p>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                                <!-- /.sidebar-menu -->

                                <nav class="mt-2">
                                    <ul class="nav nav-pills nav-sidebar flex-column" role="menu" data-accordion="false">
                                        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                                        <li class="nav-item">
                                            <a href="dashboard.php" class="nav-link <?= $location == 'dashboard' ? 'active' : '' ?>">
                                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                                <p>Dashboard</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="post.php" class="nav-link <?= $location == 'post' ? 'active' : '' ?>">
                                                <i class="nav-icon fas fa-thumbtack"></i>
                                                <p>Post</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="rooms.php" class="nav-link <?= $location == 'rooms' ? 'active' : '' ?>">
                                                <i class="nav-icon fas fa-bed"></i>
                                                <p>Room & Suite</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="reservation.php" class="nav-link <?= $location == 'reservation' ? 'active' : '' ?>">
                                                <i class="nav-icon fas fa-address-book"></i>
                                                <p>Reservation</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="restaurant.php" class="nav-link <?= $location == 'restaurant' ? 'active' : '' ?>">
                                                <i class="nav-icon fas fa-utensils"></i>
                                                <p>Restaurant</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="user.php" class="nav-link <?= $location == 'user' ? 'active' : '' ?>">
                                                <i class="nav-icon fas fa-users"></i>
                                                <p>Users</p>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                                <!-- /.sidebar-menu -->
                            </div>
                            <!-- /.sidebar -->
                        </aside>