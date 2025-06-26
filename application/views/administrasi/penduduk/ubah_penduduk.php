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
    <title>Ubah Penduduk - Admin</title>
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
                <div class="card-header bg-warning text-white">
                    <h3 class="card-title text-center m-0">UBAH DATA PENDUDUK</h3>
                </div>
                        <!-- pesan success -->
                                <div class="container">
                            <?php if ($this->session->flashdata('success')): ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <?= $this->session->flashdata('success'); ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php endif; ?>
                            <?php if ($this->session->flashdata('error')): ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <?= $this->session->flashdata('error'); ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php endif; ?>              

                <!-- Card Body -->
                <div class="card-body bg-white text-dark">
                    <!-- Tombol Kembali di pojok kanan atas -->
                    <div class="d-flex justify-content-end mb-3">
                        <a href="<?= base_url('penduduk'); ?>" class="btn btn-info">
                            &larr; Kembali
                        </a>
                        
                    </div>
                    <form action="<?= base_url('penduduk/update/' . $penduduk->penduduk_id); ?>" method="post"> 
                        <!-- NIK -->
                        <div class="mb-3">  
                            <label for="nik" class="form-label">NIK</label>
                            <input type="text" value="<?= $penduduk->nik; ?>" name="nik" class="form-control" id="nik" value="<?= set_value('nik', generate_nik()); ?>" required>
                        </div>

                        <!-- NAMA -->
                        <div class="mb-3">
                            <label for="nama_lengkap" class="form-label">Nama</label>
                            <input type="text" value="<?= $penduduk->nama_lengkap; ?>" class="form-control" name="nama_lengkap" placeholder="Nama Lengkap." id="nama_lengkap" required>
                        </div>
                        <!-- TEMPAT LAHIR -->
                        <div class="mb-3">
                            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                            <input type="text" value="<?= $penduduk->tempat_lahir; ?>" class="form-control" name="tempat_lahir" placeholder="Tempat lahir." id="tempat_lahir" required>
                        </div>
                        
                        <!-- TANGGAL LAHIR -->
                        <div class="mb-3">
                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" value="<?= $penduduk->tanggal_lahir; ?>" class="form-control" name="tanggal_lahir" id="tanggal_lahir" required>
                        </div>

                        <!-- JENIS KELAMIN -->
                        <div class="mb-3">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                            <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" required>
                                <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                <option value="L" <?= ($penduduk->jenis_kelamin == 'L') ? 'selected' : '' ?>>Laki-Laki</option>
                                <option value="P" <?= ($penduduk->jenis_kelamin == 'P') ? 'selected' : '' ?>>Perempuan</option>
                            </select>
                        </div>

                        <!-- ALAMAT -->

                            <!-- Button Toggle -->
                            <button type="button" class="btn btn-outline-info mb-3" id="toggleAlamatBtn">
                                <?= empty($penduduk->alamat) ? 'Tambah Alamat' : 'Edit Alamat' ?>
                            </button>

                            <!-- Form Alamat (Awalnya hidden jika tidak ada data) -->
                            <div class="card-body bg-dark text-white" id="alamatForm" style="display: <?= empty($penduduk->alamat) ? 'none' : 'block' ?>;">
                                <!-- Jalan -->
                                <div class="mb-3">
                                    <label class="form-label">Jalan</label>
                                    <input type="text" class="form-control" id="jalan" 
                                        value="<?= isset($alamat_data['jalan']) ? htmlspecialchars($alamat_data['jalan']) : '' ?>" 
                                        placeholder="Contoh: Jl. Merdeka No. 10">
                                </div>

                                <!-- Desa -->
                                <div class="mb-3">
                                    <label class="form-label">Desa</label>
                                    <input type="text" class="form-control" id="desa" 
                                        value="<?= isset($alamat_data['desa']) ? htmlspecialchars($alamat_data['desa']) : '' ?>" 
                                        placeholder="Contoh: Desa Sukamaju">
                                </div>

                                <!-- Kabupaten -->
                                <div class="mb-3">
                                    <label class="form-label">Kabupaten</label>
                                    <select class="form-control" id="kabupaten">
                                        <option value="">-- Pilih Kabupaten --</option>
                                        <option value="Belitung" <?= isset($alamat_data['kabupaten']) && $alamat_data['kabupaten'] == 'Belitung' ? 'selected' : '' ?>>Kabupaten Belitung</option>
                                        <option value="Belitung Timur" <?= isset($alamat_data['kabupaten']) && $alamat_data['kabupaten'] == 'Belitung Timur' ? 'selected' : '' ?>>Kabupaten Belitung Timur</option>
                                    </select>
                                </div>

                                <!-- Kecamatan -->
                                <div class="mb-3">
                                    <label class="form-label">Kecamatan</label>
                                    <select class="form-control" id="kecamatan">
                                        <option value="">-- Pilih Kecamatan --</option>
                                        <?php if (isset($alamat_data['kecamatan'])): ?>
                                            <option value="<?= htmlspecialchars($alamat_data['kecamatan']) ?>" selected>
                                                <?= htmlspecialchars($alamat_data['kecamatan']) ?>
                                            </option>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>

                            <!-- Hidden Field untuk menyimpan alamat gabungan -->
                            <textarea name="alamat" id="alamat" class="d-none"><?= !empty($penduduk->alamat) ? htmlspecialchars($penduduk->alamat) : '' ?></textarea>
                            <div id="alamatForm" style="display: none;"></div>

                        <!-- AGAMA -->
                        <div class="mb-3">
                            <label for="agama" class="form-label">Agama</label>
                            <select class="form-control" name="agama" id="agama" required>
                                <option value="" disabled selected>Pilih Agama</option>
                                <option value="Islam"<?= ($penduduk->agama == 'Islam') ? 'selected' : '' ?>>Islam</option>
                                <option value="Kristen"<?= ($penduduk->agama == 'Kristen') ? 'selected' : '' ?>>Kristen</option>
                                <option value="Katolik"<?= ($penduduk->agama == 'Katolik') ? 'selected' : '' ?>>Katolik</option>
                                <option value="Hindu"<?= ($penduduk->agama == 'Hindu') ? 'selected' : '' ?>>Hindu</option>
                                <option value="Buddha"<?= ($penduduk->agama == 'Buddha') ? 'selected' : '' ?>>Buddha</option>
                                <option value="Konghucu"<?= ($penduduk->agama == 'Konghucu') ? 'selected' : '' ?>>Konghucu</option>
                            </select>
                        </div>
                        <!-- STATUS PERKAWINAN -->
                        <div class="mb-3">
                            <label for="status_perkawinan" class="form-label">Status Perkawinan</label>
                            <select class="form-control" name="status_perkawinan" id="status_perkawinan" required>
                                <option value="" disabled selected>Pilih Status Perkawinan</option>
                                <option value="Belum Menikah"<?= ($penduduk->status_perkawinan == 'Belum Menikah') ? 'selected' : '' ?>>Belum Menikah</option>
                                <option value="Menikah"<?= ($penduduk->status_perkawinan == 'Menikah') ? 'selected' : '' ?>>Menikah</option>
                                <option value="Cerai Hidup"<?= ($penduduk->status_perkawinan == 'Cerai Hidup') ? 'selected' : '' ?>>Cerai Hidup</option>
                                <option value="Cerai Mati"<?= ($penduduk->status_perkawinan == 'Cerai Mati') ? 'selected' : '' ?>>Cerai Mati</option>
                            </select>
                        </div>
                        <!-- PENDIDIKAN -->
                        <div class="mb-3">
                            <label for="pendidikan" class="form-label">Pendidikan</label>
                            <select class="form-control" name="pendidikan" id="pendidikan" required>
                                <option value="" disabled selected>Pilih Pendidikan</option>
                                <option value="Tidak Sekolah" >Tidak Sekolah</option>
                                <option value="SD"<?= ($penduduk->pendidikan == 'SD') ? 'selected' : '' ?>>SD</option>
                                <option value="SMP"<?= ($penduduk->pendidikan == 'SMP') ? 'selected' : '' ?>>SMP</option>
                                <option value="SMA/SMK"<?= ($penduduk->pendidikan == 'SMA/SMK') ? 'selected' : '' ?>>SMA/SMK</option>
                                <option value="Diploma"<?= ($penduduk->pendidikan == 'Diploma') ? 'selected' : '' ?>>Diploma</option>
                                <option value="Sarjana"<?= ($penduduk->pendidikan == 'Sarjana') ? 'selected' : '' ?>>Sarjana</option>
                                <option value="Pasca Sarjana"<?= ($penduduk->pendidikan == 'Pasca Sarjana') ? 'selected' : '' ?>>Pasca Sarjana</option>
                            </select>
                        </div>
                        <!-- PEKERJAAN -->
                        <div class="mb-3">
                            <label for="pekerjaan" class="form-label">Pekerjaan</label>
                            <input type="text" value="<?= $penduduk->pekerjaan; ?>" class="form-control" name="pekerjaan" placeholder="Pekerjaan." id="pekerjaan" required>
                        </div>
                        <!-- KEWARGANEGARAAN -->
                        <div class="mb-3">
                            <label for="kewarganegaraan" class="form-label">Kewarganegaraan</label>
                            <select class="form-control" name="kewarganegaraan" id="kewarganegaraan" required>
                                <option value="" disabled selected>Pilih Kewarganegaraan</option>
                                <option value="WNI"<?= ($penduduk->kewarganegaraan == 'WNI') ? 'selected' : '' ?>>WNI</option>
                                <option value="WNA"<?= ($penduduk->kewarganegaraan == 'WNA') ? 'selected' : '' ?>>WNA</option>
                            </select>
                        </div>
                        <!-- NO KK -->
                        <div class="mb-3">
                            <label for="no_kk" class="form-label">Nomor Kartu Keluarga (KK)</label>
                            <input type="text" class="form-control" value="<?= $penduduk->no_kk; ?>" name="no_kk" placeholder="Nomor KK." id="no_kk" required>
                        </div>

                         <hr>
                       <!-- Tombol Reset dan Simpan -->
                        <div class="d-flex left-content-end">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-save"></i>
                                Simpan
                            </button> | 
                            <a href="<?= base_url('penduduk'); ?>" class="btn btn-info">
                            
                            <i class="fa fa-arrow-left"></i>
                            Kembali
                         </a>
                        </div>
                    </form>
                </div>

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

<script>
   document.addEventListener('DOMContentLoaded', function() {
    const kecamatanList = {
        "Belitung": ["Tanjung Pandan", "Sijuk", "Badau", "Membalong", "Selat Nasik"],
        "Belitung Timur": ["Manggar", "Damar", "Gantung", "Simpang Renggiang", "Simpang Pesak", "Kelapa Kampit"]
    };

    // Inisialisasi
    const initAlamatForm = () => {
        const alamatValue = document.getElementById('alamat').value;
        const toggleBtn = document.getElementById('toggleAlamatBtn');
        
        if (alamatValue) {
            // Jika ada data alamat, isi field tapi JANGAN auto-show form
            parseAndFillAlamat(alamatValue);
            toggleBtn.textContent = 'Edit Alamat';
        } else {
            toggleBtn.textContent = 'Tambah Alamat';
        }
    };

    // Toggle form alamat
    const toggleAlamatForm = () => {
        const form = document.getElementById('alamatForm');
        const toggleBtn = document.getElementById('toggleAlamatBtn');
        
        if (form.style.display === 'none') {
            form.style.display = 'block';
            toggleBtn.textContent = 'Sembunyikan Form';
        } else {
            form.style.display = 'none';
            toggleBtn.textContent = document.getElementById('alamat').value ? 'Edit Alamat' : 'Tambah Alamat';
        }
    };

    // Event Listener untuk tombol toggle
    document.getElementById('toggleAlamatBtn').addEventListener('click', toggleAlamatForm);

    // ... (fungsi parseAndFillAlamat, updateKecamatan, syncAlamat tetap sama)

    // Inisialisasi saat load
    initAlamatForm();
});
</script>


</body>
</html>
