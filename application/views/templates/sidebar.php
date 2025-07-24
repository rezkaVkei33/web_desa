        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-secondary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-user-edit"></i>
                </div>
                <div class="sidebar-brand-text mx-3">
                    Bayu 
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url(''); ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Manajemen Penduduk
            </div>
            
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#penduduk"
                aria-expanded="true" aria-controls="penduduk">
                <i class="fas fa-fw fa-users"></i>
                <span>Peduduk</span>
                </a>
                <div id="penduduk" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?= base_url('penduduk'); ?>">Data Penduduk</a> 
                    </div>
                </div>
            </li>
            <!-- Heading -->
            <div class="sidebar-heading">
                Manajemen Pengajuan
            </div>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pengajuan"
                    aria-expanded="true" aria-controls="pengajuan">
                    <i class="fas fa-fw fa-folder-open"></i>
                    <span>Pengajuan</span>
                </a>
                <div id="pengajuan" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Pengajuan</h6>
                        <a class="collapse-item" href="<?= base_url('pendatang'); ?>">Data Pedatang</a>
                        <a class="collapse-item" href="<?= base_url('admin/kelahiran'); ?>">Data Kelahiran</a>
                        <a class="collapse-item" href="#">Data Kematian</a>
                        <a class="collapse-item" href="#">Data Bansos</a>
                        <a class="collapse-item" href="#">Data Pindahan</a>
                        <a class="collapse-item" href="<?= base_url('Domisili/surat_domisili'); ?>">Layanan & surat</a>
                    </div>
                </div>
            </li>
            <div class="sidebar-heading">
                Layanan & Surat
            </div>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#layanan"
                    aria-expanded="true" aria-controls="layanan">
                    <i class="fas fa-fw fa-envelope"></i>
                    <span>Layanan & Surat</span>
                </a>
                <div id="layanan" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Layanan & Surat</h6>
                        <a class="collapse-item" href="<?= base_url('Domisili/surat_domisili'); ?>">Surat Domisili</a>
                    </div>
                </div>
            </li>
            <!-- Heading -->
            <div class="sidebar-heading">
                Manajemen Pengaduan
            </div>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pengaduan"
                    aria-expanded="true" aria-controls="pengaduan">
                    <i class="fas fa-fw fa-bullhorn"></i>
                    <span>Pengaduan</span>
                </a>
                <div id="pengaduan" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Pengaduan</h6>
                        <a class="collapse-item" href="#">Data Pengaduan</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            

        </ul>
        <!-- End of Sidebar -->

       