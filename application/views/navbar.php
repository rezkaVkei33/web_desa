      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="active">Home</a></li>
          <li><a href="#about">Tentang Kami</a></li>
          <li class="dropdown"><a href="#"><span>Pengajuan</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="<?= base_url('domisili'); ?>">Pengajuan Domisili</a></li> 
              <li><a href="<?= base_url('warga/kelahiran'); ?>">Pengajuan Akta Kelahiran</a></li>
              <li><a href="#">Pengajuan Akta Kematian</a></li>
              <li><a href="#">Pengajuan Bantuan Sosial</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>Pengaduan</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="#">Ajukan Pengaduan</a></li>
            </ul>
          </li>
          <li><a href="#contact">Kontak</a></li>
          <li><a href="<?= base_url('penduduk'); ?>" target="_blank">Login Admin</a></li> 
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>