<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ubah Data Pendatang - Admin</title>
    <?php $this->load->view('templates/header'); ?>
</head>
<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Begin Page Content -->
    <div class="container-fluid mt-4">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <!-- Kosongkan atau tambahkan breadcrumb kalau perlu -->
        </div>
        <!-- Konten -->
        <div class="container">
            <div class="card shadow-lg">
                
                <!-- Card Header -->
                <div class="card-header bg-secondary text-white">
                    <h3 class="card-title text-center m-0">UBAH DATA PENDATANG</h3>
                </div>

                <!-- Card Body -->
                <div class="card-body bg-white text-dark">
                    <form action="<?= base_url('pendatang/update_pendatang/' . $pendatang->id_pendatang); ?>" method="post" class="row g-4 bg-white p-5 shadow rounded-4" data-aos="fade-up" data-aos-delay="100">
                        <!-- Nama Lengkap -->
                        <div class="col-md-6">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama_lengkap" value="<?= $pendatang->nama_lengkap; ?>">
                        </div>

                        <!-- Tempat Lahir -->
                        <div class="col-md-6">
                            <label class="form-label">Tempat Lahir</label>
                            <input type="text" class="form-control" name="tempat_lahir"  value="<?= $pendatang->tempat_lahir; ?>">
                        </div>

                        <!-- Tanggal Lahir -->
                        <div class="col-md-6">
                            <label class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tanggal_lahir" value="<?= $pendatang->tanggal_lahir; ?>">
                        </div>

                        <!-- No WhatsApp -->
                        <div class="col-md-6">
                            <label class="form-label">Nomor WhatsApp</label>
                            <input type="tel" class="form-control" name="no_wa" value="<?= $pendatang->no_wa; ?>">
                        </div>

                        <!-- Email -->
                        <div class="col-md-6">
                            <label class="form-label">Alamat Email</label>
                            <input type="email" class="form-control" name="email" value="<?= $pendatang->email; ?>">
                        </div>

                        <!-- Jenis Kelamin -->
                        <div class="col-md-6">
                            <label class="form-label">Jenis Kelamin</label>
                            <select class="form-select" name="jenis_kelamin" value="<?= $pendatang->jenis_kelamin; ?>">
                            <option value="" disabled selected hidden>Pilih Jenis Kelamin</option>
                            <option value="L" <?= $pendatang->jenis_kelamin == 'L' ? 'selected' : ''; ?>>Laki-laki</option>
                            <option value="P" <?= $pendatang->jenis_kelamin == 'P' ? 'selected' : ''; ?>>Perempuan</option>
                            </select>
                        </div>

                        <!-- Alamat Asal -->
                        <div class="col-md-12">
                            <label class="form-label">Desa Asal</label>
                            <textarea class="form-control" name="alamat_asal" rows="2"><?= $pendatang->alamat_asal; ?></textarea>
                        </div>

                        <!-- Alamat Domisili -->
                        <div class="col-md-12">
                            <label class="form-label">Alamat Domisili Sekarang</label>
                            <textarea class="form-control" name="alamat_domisili" rows="2"><?= $pendatang->alamat_domisili; ?></textarea>
                        </div>

                        <!-- Alasan Pindah -->
                        <div class="col-md-12">
                            <label class="form-label">Alasan Pindah</label>
                            <textarea class="form-control" name="alasan_pindah" rows="3"><?= $pendatang->alasan_pindah; ?></textarea>
                        </div>

                        <!-- Tombol -->
                        <div class="col-md-12 text-center mt-4">
                            <button type="submit" class="btn btn-primary px-5 py-2 rounded-pill shadow-sm">
                            <i class="fa fa-edit"></i> update
                            </button>
                            <a href="<?= base_url('pendatang'); ?>" class="btn btn-outline-secondary px-4 py-2 rounded-pill ms-2">
                            <i class="fa fa-arrow-left"></i> Kembali
                            </a>
                        </div>
                    </form>
                </div>

            </div>
        <!-- End Konten -->
    <!-- /.container-fluid -->

    <?php $this->load->view('templates/footer'); ?>

</div>
<!-- End of Content Wrapper -->

<?php $this->load->view('templates/logout'); ?>

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<?php $this->load->view('templates/scripts'); ?>


</body>
</html>
