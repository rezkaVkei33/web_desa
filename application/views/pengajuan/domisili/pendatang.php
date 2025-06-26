  <!DOCTYPE html>
  <html lang="en">

  <head>
      <?php $this->load->view('head'); ?>
      <title>Layanan Desa Ibul</title>
    
  </head>

  <body class="index-page">

    <header id="header" class="header d-flex align-items-center fixed-top">
      <div class="container-fluid position-relative d-flex align-items-center justify-content-between">
        
        <a href="<?= base_url(''); ?>" class="logo d-flex align-items-center">
          <!-- Uncomment the line below if you also wish to use an image logo -->
          <img src="<?= base_url('assets/img/Logo_Belitung.png'); ?>" alt=""> 
          <h1 class="sitename">DESA IBUL</h1>
        </a>
  <?php $this->load->view('navbar'); ?>

      </div>
    </header>

     <section id="domisili" class="section bg-light">
  <div class="container py-5" data-aos="fade-up">

    <div class="section-title text-center mb-5 py-4 px-3 rounded-4 shadow-sm" style="background: linear-gradient(135deg, #a8edea, #fed6e3);">
        <h2 class="fw-bold text-primary-emphasis"> Formulir Pendatang Domisili</h2>
        <p class="text-dark mt-2">Silakan isi formulir berikut dengan lengkap dan benar <span class="text-danger-emphasis"></span></p>
    </div>

    <?php $this->load->view('templates/setflash_data'); ?>
    
    <form action="<?= base_url('domisili/simpan_pendatang'); ?>" method="post" class="row g-4 bg-white p-5 shadow rounded-4" data-aos="fade-up" data-aos-delay="100">
      
      <!-- Nama Lengkap -->
      <div class="col-md-6">
        <label class="form-label">Nama Lengkap</label>
        <input type="text" class="form-control" name="nama_lengkap" placeholder="Contoh: Siti Nurjanah" required>
      </div>

      <!-- Tempat Lahir -->
      <div class="col-md-6">
        <label class="form-label">Tempat Lahir</label>
        <input type="text" class="form-control" name="tempat_lahir" placeholder="Contoh: Badau" required>
      </div>

      <!-- Tanggal Lahir -->
      <div class="col-md-6">
        <label class="form-label">Tanggal Lahir</label>
        <input type="date" class="form-control" name="tanggal_lahir" required>
      </div>

      <!-- No WhatsApp -->
      <div class="col-md-6">
        <label class="form-label">Nomor WhatsApp</label>
        <input type="tel" class="form-control" name="no_wa" placeholder="+62xxxxxx" required>
      </div>

      <!-- Email -->
      <div class="col-md-6">
        <label class="form-label">Alamat Email</label>
        <input type="email" class="form-control" name="email" placeholder="email@domain.com">
      </div>

      <!-- Jenis Kelamin -->
      <div class="col-md-6">
        <label class="form-label">Jenis Kelamin</label>
        <select class="form-select" name="jenis_kelamin" required>
          <option value="" disabled selected hidden>Pilih Jenis Kelamin</option>
          <option value="L">Laki-laki</option>
          <option value="P">Perempuan</option>
        </select>
      </div>

      <!-- Alamat Asal -->
      <div class="col-md-12">
        <label class="form-label">Alamat Asal</label>
        <textarea class="form-control" name="alamat_asal" rows="2" placeholder="Alamat lengkap sebelum pindah..." required></textarea>
      </div>

      <!-- Alamat Domisili -->
      <div class="col-md-12">
        <label class="form-label">Alamat Domisili Sekarang</label>
        <textarea class="form-control" name="alamat_domisili" rows="2" placeholder="Alamat tempat tinggal saat ini..." required></textarea>
      </div>

      <!-- Alasan Pindah -->
      <div class="col-md-12">
        <label class="form-label">Alasan Pindah</label>
        <textarea class="form-control" name="alasan_pindah" rows="3" placeholder="Ceritakan secara singkat alasan pindah..." required></textarea>
      </div>

      <!-- Tombol -->
      <div class="col-md-12 text-center mt-4">
        <button type="submit" class="btn btn-primary px-5 py-2 rounded-pill shadow-sm">
          <i class="bi bi-send-check-fill me-1"></i> Kirim
        </button>
        <a href="<?= base_url('domisili'); ?>" class="btn btn-outline-secondary px-4 py-2 rounded-pill ms-2">
          <i class="bi bi-arrow-left me-1"></i> Kembali
        </a>
      </div>

    </form>
  </div>
</section>


    </main>

  <?php $this->load->view('footer'); ?>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

  <?php $this->load->view('scripts'); ?>
  </body>

  </html>
  ?>