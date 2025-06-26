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
    <title>Tambah Penduduk - Admin</title>
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
                <div class="card-header bg-success text-white">
                    <h3 class="card-title text-center m-0">TAMBAH DATA PENDUDUK</h3>
                </div>

                <?php $this->load->view('templates/setflash_data'); ?>

                <!-- Card Body -->
                <div class="card-body bg-white text-dark">
                    <!-- Tombol Kembali di pojok kanan atas -->
                    <div class="d-flex justify-content-end mb-3">
                        <a href="<?= base_url('penduduk'); ?>" class="btn btn-info">
                            &larr; Kembali
                        </a>
                    </div>
                    <form action="<?= base_url('penduduk/simpan_penduduk'); ?>" method="post">
                        <!-- NIK -->
                        <div class="mb-3">
                            <label for="nik" class="form-label">NIK</label>
                            <input type="text" name="nik" class="form-control" id="nik" value="<?= set_value('nik', generate_nik()); ?>" required>
                        </div>

                        <!-- NAMA -->
                        <div class="mb-3">
                            <label for="nama_lengkap" class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama_lengkap" placeholder="Nama Lengkap." id="nama_lengkap" required>
                        </div>
                        <!-- TEMPAT LAHIR -->
                        <div class="mb-3">
                            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                            <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat lahir." id="tempat_lahir" required>
                        </div>
                        
                        <!-- TANGGAL LAHIR -->
                        <div class="mb-3">
                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" required>
                        </div>

                        <!-- JENIS KELAMIN -->
                        <div class="mb-3">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                            <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" required>
                                <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <!-- ALAMAT -->
                        <!-- Tombol untuk menampilkan form alamat -->
                            <button type="button" class="btn btn-outline-info mb-3" onclick="toggleAlamatForm()">Masukkan Alamat</button>

                            <!-- Form alamat dinamis (hidden by default) -->
                            <div id="alamatForm" class="card-body bg-dark text-white"" style="display: none;">
                                <div class="mb-3">
                                    <label class="form-label">Jalan</label>
                                    <input type="text" class="form-control" id="jalan" placeholder="Contoh: Jl. Merdeka No. 10">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Desa</label>
                                    <input type="text" class="form-control" id="desa" placeholder="Contoh: Desa Sukamaju">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Kabupaten</label>
                                    <select class="form-control" id="kabupaten" onchange="updateKecamatan()">
                                        <option value="">-- Pilih Kabupaten --</option>
                                        <option value="Belitung">Kabupaten Belitung</option>
                                        <option value="Belitung Timur">Kabupaten Belitung Timur</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Kecamatan</label>
                                    <select class="form-control" id="kecamatan">
                                        <option value="">-- Pilih Kecamatan --</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Hidden Textarea untuk alamat gabungan -->
                            <textarea name="alamat" id="alamat" class="d-none"></textarea>

                        <!-- AGAMA -->
                        <div class="mb-3">
                            <label for="agama" class="form-label">Agama</label>
                            <select class="form-control" name="agama" id="agama" required>
                                <option value="" disabled selected>Pilih Agama</option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Buddha">Buddha</option>
                                <option value="Konghucu">Konghucu</option>
                            </select>
                        </div>
                        <!-- STATUS PERKAWINAN -->
                        <div class="mb-3">
                            <label for="status_perkawinan" class="form-label">Status Perkawinan</label>
                            <select class="form-control" name="status_perkawinan" id="status_perkawinan" required>
                                <option value="" disabled selected>Pilih Status Perkawinan</option>
                                <option value="Belum Menikah">Belum Menikah</option>
                                <option value="Menikah">Menikah</option>
                                <option value="Cerai Hidup">Cerai Hidup</option>
                                <option value="Cerai Mati">Cerai Mati</option>
                            </select>
                        </div>
                        <!-- PENDIDIKAN -->
                        <div class="mb-3">
                            <label for="pendidikan" class="form-label">Pendidikan</label>
                            <select class="form-control" name="pendidikan" id="pendidikan" required>
                                <option value="" disabled selected>Pilih Pendidikan</option>
                                <option value="Tidak Sekolah">Tidak Sekolah</option>
                                <option value="SD">SD</option>
                                <option value="SMP">SMP</option>
                                <option value="SMA/SMK">SMA/SMK</option>
                                <option value="Diploma">Diploma</option>
                                <option value="Sarjana">Sarjana</option>
                                <option value="Pasca Sarjana">Pasca Sarjana</option>
                            </select>
                        </div>
                        <!-- PEKERJAAN -->
                        <div class="mb-3">
                            <label for="pekerjaan" class="form-label">Pekerjaan</label>
                            <input type="text" class="form-control" name="pekerjaan" placeholder="Pekerjaan." id="pekerjaan" required>
                        </div>
                        <!-- KEWARGANEGARAAN -->
                        <div class="mb-3">
                            <label for="kewarganegaraan" class="form-label">Kewarganegaraan</label>
                            <select class="form-control" name="kewarganegaraan" id="kewarganegaraan" required>
                                <option value="" disabled selected>Pilih Kewarganegaraan</option>
                                <option value="WNI">WNI</option>
                                <option value="WNA">WNA</option>
                            </select>
                        </div>
                        <!-- NO KK -->
                        <div class="mb-3">
                            <label for="no_kk" class="form-label">Nomor Kartu Keluarga (KK)</label>
                            <input type="text" class="form-control" name="no_kk" placeholder="Nomor KK." id="no_kk" required>
                        </div>

                         <hr>
                       <!-- Tombol Reset dan Simpan -->
                        <div class="d-flex left-content-end">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-save"></i>
                                Simpan
                            </button> | 
                            <button type="reset" class="btn btn-secondary">
                                <i class="fa fa-refresh" aria-hidden="true"></i>
                                Reset</button>
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
    const kecamatanList = {
        "Belitung": [
            "Tanjung Pandan",
            "Sijuk",
            "Badau",
            "Membalong",
            "Selat Nasik"
        ],
        "Belitung Timur": [
            "Manggar",
            "Damar",
            "Gantung",
            "Simpang Renggiang",
            "Simpang Pesak",
            "Kelapa Kampit"
        ]
    };

    const toggleAlamatForm = () => {
        const form = document.getElementById('alamatForm');
        form.style.display = form.style.display === "none" ? "block" : "none";
    };

    const updateKecamatan = () => {
        const kab = document.getElementById('kabupaten').value;
        const kecamatanSelect = document.getElementById('kecamatan');
        kecamatanSelect.innerHTML = '<option value="">-- Pilih Kecamatan --</option>';

        if (kab && kecamatanList[kab]) {
            kecamatanList[kab].forEach(kec => {
                const opt = document.createElement('option');
                opt.value = kec;
                opt.innerText = kec;
                kecamatanSelect.appendChild(opt);
            });
        }
    };

    const jalan = document.getElementById('jalan');
    const desa = document.getElementById('desa');
    const kabupaten = document.getElementById('kabupaten');
    const kecamatan = document.getElementById('kecamatan');
    const alamat = document.getElementById('alamat');

    const syncAlamat = () => {
        const j = jalan.value.trim();
        const d = desa.value.trim();
        const kcm = kecamatan.value.trim();
        const kb = kabupaten.value.trim();

        alamat.value = `${j}, ${d}, Kec. ${kcm}, Kab. ${kb}`;
    };

    jalan.addEventListener('input', syncAlamat);
    desa.addEventListener('input', syncAlamat);
    kabupaten.addEventListener('change', () => {
        updateKecamatan();
        syncAlamat();
    });
    kecamatan.addEventListener('change', syncAlamat);
</script>


</body>
</html>
