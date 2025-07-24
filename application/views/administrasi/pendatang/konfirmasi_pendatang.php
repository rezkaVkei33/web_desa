<?php
// Generate NIK: 6 digit kode wilayah + tanggal lahir + random 4 digit
function generate_nik() {
    $kode_wilayah = '190203'; // Misal kode Belitung
    $tgl = date('dmy'); // Tanggal hari ini
    $acak = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
    return $kode_wilayah . $tgl . substr($acak, 0, 4);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tambah Surat Domisili - Admin</title>
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
                    <h3 class="card-title text-center m-0">TAMBAH SURAT DOMISILI</h3>
                </div>

                <!-- Card Body -->
                <div class="card-body bg-white text-dark">
                    <!-- Tombol Kembali di pojok kanan atas -->
                    <div class="d-flex justify-content-end mb-3">
                        <a href="<?= base_url('pendatang'); ?>" class="btn btn-info">
                            &larr; Kembali
                        </a>
                    </div>
                    <form action="<?= base_url('pendatang/simpan_surat_domisili'); ?>" method="post">
                        <input type="hidden" name="id_pendatang" value="<?= $pendatang->id_pendatang ?>">
                        <!-- NOMOR SURAT -->
                        <div class="mb-3">
                            <label for="nomor_surat" class="form-label">Nomor Surat</label>
                            <input type="text" name="nomor_surat" id="nomor_surat" class="form-control" 
                                value="<?= isset($nomor_surat) ? $nomor_surat : ''; ?>" readonly>
                        </div>

                        <!-- TANGGAL TERBIT -->
                        <div class="mb-3">
                            <label for="tanggal_terbit" class="form-label">Tanggal Terbit</label>
                            <input type="date" class="form-control" name="tanggal_terbit" id="tanggal_terbit" required>
                        </div>

                        <!-- KETERANGAN -->
                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <textarea name="keterangan" id="keterangan" class="form-control"></textarea>
                        </div>
                        

                         <hr>
                       <!-- Tombol Reset dan Simpan -->
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary me-2">
                                <i class="fa fa-paper-plane"></i>
                                Kirim
                            </button>
                            <button type="reset" class="btn btn-secondary">
                                <i class="fa fa-refresh" aria-hidden="true"></i>
                                Reset
                            </button>
                        </div>
                    </form>
                </div>
        <!-- End Konten -->

    </div>
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
