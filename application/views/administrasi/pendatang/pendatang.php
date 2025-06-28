<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('templates/header'); ?>

    <title>Domisili Pendatang - Admin</title>
    <style>
        /* Animasi dan micro-interactions */
        #deleteModal .modal-content {
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        #deleteModal .modal-content:hover {
        transform: translateY(-2px);
        box-shadow: 0 0.5rem 1.5rem rgba(220, 53, 69, 0.2) !important;
        }

        #confirmDeleteBtn {
        transition: all 0.2s ease;
        position: relative;
        overflow: hidden;
        }

        #confirmDeleteBtn:after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 5px;
        height: 5px;
        background: rgba(255, 255, 255, 0.5);
        opacity: 0;
        border-radius: 100%;
        transform: scale(1, 1) translate(-50%);
        transform-origin: 50% 50%;
        }

        #confirmDeleteBtn:focus:not(:active)::after {
        animation: ripple 0.6s ease-out;
        }

        @keyframes ripple {
        0% {
            transform: scale(0, 0);
            opacity: 0.5;
        }
        100% {
            transform: scale(20, 20);
            opacity: 0;
        }
        }
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

    <?php $this->load->view('templates/sidebar'); ?>
    <?php $this->load->view('templates/topbar'); ?>

     

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Data Domisili / Pendatang</h1>    
                    </div>

                    <!-- konten -->
                    <div class="container">
                        <div class="card">
                        <div class="card-body">                       
                        <?php $this->load->view('templates/setflash_data'); ?>

                        <div class="table-responsive">
                            <table class="table table-striped">
                            <thead class="text-center">
                                <th>No</th>
                                <th >Nama Lengkap</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat Asal</th>
                                <th>Alamat Domisili</th>
                                <th>Status</th>
                                <th>Tanggal Update</th>
                                <th >Aksi</th>
                            </thead>
                            <tbody>
                            <?php if(!empty($pendatang)) : ?>
                            <?php $no = 1; foreach ($pendatang as $data): ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $data->nama_lengkap; ?></td>
                                    <td class="text-center"><?= $data->jenis_kelamin; ?></td>
                                    <td><?= $data->alamat_asal; ?></td>
                                    <td><?= $data->alamat_domisili; ?></td>
                                    <td><?= $data->status_pengajuan; ?></td>
                                    <td><?= date('d-m-Y H:i:s', strtotime($data->update_tanggal)); ?></td>
                                    <td class="text-center">
                                        <a href="" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i> Ubah
                                        </a><br>
                                        <a href="" class="btn btn-info btn-sm">
                                            <i class="fas fa-eye"></i> Detail
                                        </a><br>
                                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button><br>
                                        <a href="<?= base_url('pendatang/konfirmasi_pendatang/'. $data->id_pendatang); ?>" class="btn btn-primary btn-sm"> 
                                            <i class="fas fa-edit"></i> Konfirmasi
                                        </a>

                                    <!-- Modal Hapus Penduduk -->
                                    <div class="modal fade" id="" tabindex="-1" aria-labelledby="modalLabel-" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header bg-danger text-white">
                                                    <h5 class="modal-title text-white" id="modalLabel-">HAPUS DATA PENDUDUK</h5>
                                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                                </div>
                                                <div class="modal-body text-center">
                                                    <p>Apakah Anda yakin ingin <br>
                                                    menghapus data penduduk <strong></strong>?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="" class="btn btn-danger">Ya, Hapus</a>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end modal -->
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                <?php else: ?>
                                     <tr>
                                        <td colspan="6" class="text-center text-danger ">Tidak ada Domisili/Pendatang.</td>
                                    </tr>
                               <?php endif; ?>
                            </tbody>
                            </table>
                        </div>
                    </div>
                            
                        </div>
                    </div>
                    </div>

                    <!-- end konten -->
   
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

           <?php $this->load->view('templates/footer'); ?>

        </div>
        <!-- End of Content Wrapper -->
        <?php $this->load->view('templates/logout'); ?>

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

 

</body>

<?php $this->load->view('templates/scripts'); ?>

      <script>
      // Fungsi untuk menampilkan modal
      function showDeleteModal(itemDetails, deleteUrl) {
      const modal = new bootstrap.Modal(document.getElementById('deleteModal'));
      const detailsElement = document.getElementById('deleteItemDetails');
      
      // Set detail data yang akan dihapus
      if(itemDetails) {
         detailsElement.innerHTML = `Anda akan menghapus: <strong>${itemDetails}</strong>`;
      }
      
      // Handler tombol konfirmasi
      document.getElementById('confirmDeleteBtn').onclick = function() {
         this.innerHTML = '<span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span> Menghapus...';
         this.disabled = true;
         
         // Eksekusi penghapusan (AJAX contoh)
         fetch(deleteUrl, {
            method: 'POST',
            headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Content-Type': 'application/json',
            '<?= $this->security->get_csrf_token_name() ?>': '<?= $this->security->get_csrf_hash() ?>'
            }
         })
         .then(response => response.json())
         .then(data => {
            if(data.success) {
            // Refresh halaman atau update UI
            window.location.reload();
            } else {
            showErrorAlert(data.message || 'Gagal menghapus data');
            modal.hide();
            }
         })
         .catch(error => {
            showErrorAlert('Terjadi kesalahan jaringan');
            console.error('Error:', error);
         })
         .finally(() => {
            this.innerHTML = '<i class="bi bi-trash3 me-1"></i> Ya, Hapus';
            this.disabled = false;
         });
      };
      
      modal.show();
      }

      // Fungsi untuk menampilkan alert error
      function showErrorAlert(message) {
      const alert = `<div class="alert alert-danger alert-dismissible fade show" role="alert">
         <i class="bi bi-exclamation-octagon-fill me-2"></i>
         ${message}
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>`;
      
      document.body.insertAdjacentHTML('afterbegin', alert);
      }

      // Contoh penggunaan:
      // <button onclick="showDeleteModal('Penduduk: John Doe (NIK: 123456)', '/penduduk/delete/123')">
      //   Hapus Data
      // </button>
      </script>

</html>