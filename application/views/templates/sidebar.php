<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('welcome') ?>">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-store"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Warkop Suka-Suka</div>
            </a>
            <?php
            defined('BASEPATH') or exit('No direct script access allowed');

            //fungsi untuk merubah nama hari menjadi hari indonesia
            function hari_ini()
            {
                switch (date('D')) {
                    case 'Sun':
                        $hari = 'Minggu';
                        break;
                    case 'Mon':
                        $hari = 'Senin';
                        break;
                    case 'Tue':
                        $hari = 'Selasa';
                        break;
                    case 'Wed':
                        $hari = 'Rabu';
                        break;
                    case 'Thu':
                        $hari = 'Kamis';
                        break;
                    case 'Fri':
                        $hari = 'Jum\'at';
                        break;
                    case 'Sat':
                        $hari = 'Sabtu';
                        break;

                    default:
                        $hari = 'Hari tidak diketahui';
                        break;
                }

                return $hari;
            }

            //fungsi untuk merubah format tanggal menjadi tanggal indonesia
            function tanggal_indo()
            {
                $bulan  = [1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                date_default_timezone_set('Asia/Jakarta');
                $timestamp = time();
                $exp    = explode('-', date('d-m-Y, H:i:s', $timestamp));
                return $exp[0] . ' ' . $bulan[(int) $exp[1]] . ' ' . $exp[2];
            }
            ?>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url('welcome') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Kategori
            </div>
            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('kategori/makanan_utama') ?>">
                    <img src="<?php echo base_url('assets/img/utama.svg'); ?>">
                    <span>Menu Utama</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('kategori/makanan_padat') ?>">
                    <img src="<?php echo base_url('assets/img/food.svg'); ?>">
                    <span>Makanan Padat</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('kategori/minuman') ?>">
                    <img src="<?php echo base_url('assets/img/minuman.svg'); ?>" class="img-fluid" alt="Responsive image">
                    <span>Minuman</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('kategori/cemilan') ?>">
                    <img src="<?php echo base_url('assets/img/cemilan.svg'); ?>" class="img-fluid" alt="Responsive image">
                    <span>Cemilan</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('kategori/indomie') ?>">
                    <img src="<?php echo base_url('assets/img/indomie.svg'); ?>" class="img-fluid" alt="Responsive image">
                    <span>Indomie</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('kategori/corndog') ?>" class="img-fluid" alt="Responsive image">
                    <img src="<?php echo base_url('assets/img/hotdog.svg'); ?>">
                    <span>Hotdog</span></a>
            </li>
            <br>
            <a class="btn btn-danger" href="<?= base_url('auth/logout'); ?>">Logout</a>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>

        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form action="<?php echo base_url('dashboard/search'); ?>" method="post" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input name="keyword" type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <a class="nav-link text-primary" tabindex="-1" aria-disabled="true"><?= hari_ini(); ?>, <?= tanggal_indo(); ?></a>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-primary" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="<?= base_url('assets/img/keranjang.svg') ?>" /> &nbsp
                                <?= $this->cart->total_items(); ?> items
                            </a>
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <ul class="nav navbar-nav navbar-right">
                                    <li class="mb-2 mr-3 nav-item">
                                        <a class="nav-link text-primary" href="<?php echo base_url('dashboard/history') ?>">
                                            History Belanja
                                        </a>
                                    </li>
                                    <li class="mb-2 mr-3 nav-item">
                                        <a class="nav-link text-primary" href="https://wa.me/6282135888258?text=Silahkan bayar dan upload bukti pembayaran sesuai pesanan ">
                                            Upload Bukti Pembayaran
                                        </a>
                                    </li>
                                    <li class="mb-2 mr-3 nav-item text-primary">

                                        <a href="<?php echo ('dashboard/detail_keranjang') ?>" class="nav-link text-primary">
                                            <img src="<?= base_url('assets/img/keranjang.svg') ?>" /> &nbsp
                                            <?= $this->cart->total_items(); ?> items
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <?php if ($this->session->userdata('username')) { ?>
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle text-dark" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-user fa-sm"></i> &nbsp;
                                    <span class="d-none d-lg-inline text-gray-800 large">Hi <?= $user['nama'] ?></span>
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="<?= base_url('dashboard/my_profile'); ?>">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-800 large"></i>
                                        Profile Saya
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="<?= base_url('dashboard/edit_profile') ?>">
                                        <i class="fa-solid fa-user-pen fa-fw mr-2 text-gray-800 large"></i>
                                        Edit Profile
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="<?= base_url('dashboard/edit_password') ?>">
                                        <i class="fa-solid fa-key fa-fw mr-2 text-gray-800 large"></i>
                                        Ganti Password
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="<?= base_url('auth/logout') ?>">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-800 large"></i>
                                        Logout
                                    </a>
                                </div>
                            </li>
                        <?php } else { ?>
                            <ul class="na navbar-nav navbar-right mt-4 mr-4">
                                <li><?php echo anchor('auth/login', 'Login'); ?></li>
                            <?php } ?>
                            </ul>
                    </ul>
                </nav>