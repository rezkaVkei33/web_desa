<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('head'); ?>
    <title>Layanan Domisili - Desa Ibul</title>
    <style>
    .text-gradient-primary {
        background: linear-gradient(45deg, #4e73df, #224abe);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }
    
    .hover-effect {
        transition: all 0.3s ease;
        transform: translateY(0);
    }
    
    .hover-effect:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }
    
    .btn-lg {
        min-width: 200px;
    }
</style>
  
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid position-relative d-flex align-items-center justify-content-between">

      <a href="<?= base_url(''); ?>" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="<?= base_url('assets/img/Logo_Belitung.png'); ?>" alt="">
        <h1 class="sitename">Desa Ibul</h1>
      </a>
<?php $this->load->view('navbar'); ?>

    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section">

      <img src="assets/img/hero-bg.jpg" alt="" data-aos="fade-in" class="">

      <div class="container text-center py-4">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h3 class="mb-4">Silahkan Pilih</h3>
                <p class="text-secondary mb-4">Untuk Pengajuan Pindahan Atau Pendatang</p>
                
                 <!-- Tombol Pindahan -->
                <a href="<?= base_url('domisili/pindahan'); ?>" target="_blank" class="btn btn-lg btn-primary px-4 py-3 rounded-pill shadow-sm hover-effect">
                    <div class="d-flex align-items-center justify-content-center">
                        <i class="fas fa-truck-moving fa-lg me-2"></i>
                        <span>Pindahan Domisili</span>
                    </div>
                    <small class="d-block mt-1 text-white-50">Untuk warga berpindah domisili</small>
                </a>
                
                <!-- Tombol Pendatang --> 
                <a href="<?= base_url('domisili/pendatang'); ?>" class="btn btn-lg btn-success px-4 py-3 rounded-pill shadow-sm hover-effect">
                    <div class="d-flex align-items-center justify-content-center">
                        <i class="fas fa-walking fa-lg me-2"></i>
                        <span>Pendatang Baru</span>
                    </div>
                    <small class="d-block mt-1 text-white-50">Untuk warga baru di wilayah ini</small>
                </a>
            </div>
        </div>
    </div>

    </section><!-- /Hero Section -->


 <?php $this->load->view('footer'); ?>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

<?php $this->load->view('scripts'); ?>
</body>

</html>
?>