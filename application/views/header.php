<header id="header" class="header d-flex align-items-center fixed-top">
      <div class="container-fluid position-relative d-flex align-items-center justify-content-between">

        <a href="<?= base_url(''); ?>" class="logo d-flex align-items-center">
          <!-- Uncomment the line below if you also wish to use an image logo -->
          <img src="<?= base_url('assets/img/Logo_Belitung.png'); ?>" alt=""> 
          <h1 class="sitename">DESA IBUL</h1>
          <?php $this->load->view('message'); ?>
        </a>
      <?php $this->load->view('navbar'); ?>

      </div>
    </header>