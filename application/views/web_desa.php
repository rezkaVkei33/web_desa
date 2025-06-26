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
          <h1 class="sitename">Desa Ibul</h1>
        </a>
  <?php $this->load->view('navbar'); ?>

      </div>
    </header>

    <main class="main">

      <!-- Hero Section -->
      <section id="hero" class="hero section">

        <img src="assets/img/hero-bg.jpg" alt="" data-aos="fade-in" class="">

        <div class="container text-center" data-aos="fade-up" data-aos-delay="100">
          <div class="row justify-content-center">
            <div class="col-lg-8">
              <h2>Selamat datang wahai pengembara <br>&#128526;</h2>
              <p>Kami Menyediakan Layanan Administrasi dan Pengaduan Desa Ibul</p>
              <a href="#about" class="btn-get-started">Hayyuuk</a>
            </div>
          </div>
        </div>

      </section><!-- /Hero Section -->

      <!-- About Section -->
      <section id="about" class="about section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
          <h2>Tentang kami</h2>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

          <div class="row gy-4">
            <div class="col-lg-6">
              <img src="assets/img/desa_ibul.jpg" class="img-fluid" alt="">
            </div>
            <div class="col-lg-6 content">
              <h3>Desa Ibul </h3>
              <p class="fst-italic">
                Desa Ibul resmi dimekarkan dari Desa Badau dan diresmikan pada 18 Mei 2011. Pemekaran ini bertujuan untuk meningkatkan efektifitas pelayanan pemerintahan dan pembangunan kepada masyarakat. . Desa ini memiliki potensi sumber daya alam yang melimpah, seperti pertanian, perkebunan, dan peternakan. Selain itu, Desa Ibul juga memiliki keindahan alam yang menawan, seperti pegunungan dan sungai yang bersih.
              </p>
              <ul>
                <li><i class="bi bi-check2-all"></i> <span style="text-align: justify;">Desa Ibul menyediakan berbagai layanan administrasi seperti surat keterangna domisili dan surat permohonan bantuan sosial. Layanan ini ditujukan untuk mempermudah warga dalam mengurus dokumen resmi tanpa harus datang langsung ke kantor desa</span></li>
                <li><i class="bi bi-check2-all"></i> <span style="text-align: justify;">Jika anda memiliki keluhan terkait pelayanan publik, infrastruktur, atau masalah sosial lainnya, Anda dapat menyampaikan pengaduan langsung melalui sistem ini. Tim desa akan menindaklanjuti pengaduan Anda dengan cepat dan transparan.</span></li>
              </ul>
            </div>
          </div>

        </div>

      </section><!-- /About Section -->

      <!-- Why Us Section -->
      <section id="why-us" class="why-us section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
          <h2>Why Us</h2>
          <p>&#128527;</p>
        </div><!-- End Section Title -->

        <div class="container">

          <div class="row gy-4" data-aos="fade-up" data-aos-delay="100">

            <div class="col-md-4">
              <div class="card">
                <div class="img">
                  <img src="assets/img/why-us-1.jpg" alt="" class="img-fluid">
                  <div class="icon"><i class="bi bi-hdd-stack"></i></div>
                </div>
                <h2 class="title"><a href="#" class="stretched-link">Our Mission</a></h2>
                <p style="text-align: center;">
                  Memberikan pelayanan administrasi dan pengaduan warga Desa Ibul dengan mudah, cepat, dan transparan berbasis web, guna meningkatkan kualitas pelayanan publik di tingkat desa.
                </p>
              </div>
            </div><!-- End Card Item -->

            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
              <div class="card">
                <div class="img">
                  <img src="assets/img/why-us-2.jpg" alt="" class="img-fluid">
                  <div class="icon"><i class="bi bi-brightness-high"></i></div>
                </div>
                <h2 class="title"><a href="#" class="stretched-link">Our Plan</a></h2>
                <p style="text-align: center;">
                  Mengembangkan sistem yang terintegrasi dengan data kependudukan dan layanan desa lainnya, serta mensosialisasikan penggunaan teknologi kepada warga secara bertahap.
                </p>
              </div>
            </div><!-- End Card Item -->

            <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
              <div class="card">
                <div class="img">
                  <img src="assets/img/why-us-3.jpg" alt="" class="img-fluid">
                  <div class="icon"><i class="bi bi-calendar4-week"></i></div>
                </div>
                <h2 class="title"><a href="#" class="stretched-link">Our Vision</a></h2>
                <p style="text-align: center;">
                  Menjadi platform pelayanan desa digital yang inovatif dan terpercaya, serta menjadi contoh penerapan teknologi informasi di desa-desa lainnya.
                </p>
              </div>
            </div><!-- End Card Item -->

          </div>

        </div>

      </section><!-- /Why Us Section -->

      <!-- Services Section -->
      
      <!--dah dihapus :v-->

    <!-- /Services Section -->

      <!-- Contact Section -->
      <section id="contact" class="contact section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
          <h2>Hubungi Aing</h2>
          <p>Hubungi kami jika ada masukan tentang website ini hehe</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

          <div class="row gy-4" data-aos="fade-up" data-aos-delay="200">

            <div class="col-lg-4">
              <div class="info-item d-flex flex-column justify-content-center align-items-center">
                <i class="bi bi-geo-alt"></i>
                <h3>Alamat</h3>
                <p>Jl DM Gersik Dalam, Rumah yang banyak kucing</p>
              </div>
            </div><!-- End Info Item -->

            <div class="col-lg-4">
              <div class="info-item d-flex flex-column justify-content-center align-items-center info-item-borders">
                <i class="bi bi-telephone"></i>
                <h3>Nomor telepon</h3>
                <p>+62831-dan-sebagainya</p>
              </div>
            </div><!-- End Info Item -->

            <div class="col-lg-4">
              <div class="info-item d-flex flex-column justify-content-center align-items-center">
                <i class="bi bi-envelope"></i>
                <h3>Email</h3>
                <p>Ahoi_sensei@example.com.beran</p>
              </div>
            </div><!-- End Info Item -->

          </div>

          <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="300">
            <div class="row gy-4">

              <div class="col-md-6">
                <input type="text" name="name" class="form-control" placeholder="Your Name" required="">
              </div>

              <div class="col-md-6 ">
                <input type="email" class="form-control" name="email" placeholder="Your Email" required="">
              </div>

              <div class="col-md-12">
                <input type="text" class="form-control" name="subject" placeholder="Subject" required="">
              </div>

              <div class="col-md-12">
                <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
              </div>

              <div class="col-md-12 text-center">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Pesan anda telah tersampaikan, mungkin belum dibaca. Harap sabar ya...
                                          Orang sabar dapat hadiah misterius...aselolee
                </div>

                <button type="submit">Kirim</button>
              </div>

            </div>
          </form><!-- End Contact Form -->

        </div>

      </section><!-- /Contact Section -->

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