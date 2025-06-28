<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Dompdf\Dompdf;
use Dompdf\Options;

class Pendatang extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Pendatang_model');
        $this->load->model('Domisili_model');
        $this->load->library('email');
    }

    public function index() {
        $data['pendatang'] = $this->Pendatang_model->get_all();
        $this->load->view('administrasi/pendatang/pendatang', $data);
    }
    public function konfirmasi_pendatang($id_pendatang) {
        $data['pendatang'] = $this->Domisili_model->get_pendatang_by_id($id_pendatang);
        $this->load->view('administrasi/pendatang/konfirmasi_pendatang', $data);
    }
    public function simpan_surat_domisili(){
        $id_pendatang = $this->input->post('id_pendatang');
        $nomor_surat = $this->input->post('nomor_surat');
        $tanggal_terbit = $this->input->post('tanggal_terbit');
        $keterangan = $this->input->post('keterangan');

        $pendatang = $this->Domisili_model->get_pendatang_by_id($id_pendatang);

        $nama_file = 'Surat_Domisili_' . $id_pendatang . '.pdf';
        $path_file = FCPATH . 'uploads/surat_domisili/' . $nama_file;
        $this->_generate_pdf($pendatang,
            $nomor_surat, 
            $tanggal_terbit, 
            $keterangan, 
            $path_file
        );

        $this->Domisili_model->insert([
            'id_pendatang' => $id_pendatang,
            'nomor_surat' => $nomor_surat,
            'tanggal_terbit' => $tanggal_terbit,
            'keterangan' => $keterangan,
            'file_surat' => $nama_file
        ]);

        $this->Domisili_model->get_status_pendatang($id_pendatang, 'Disetujui');

        // email + wa
        $this->_send_email($pendatang->email, $pendatang->nama_lengkap, $path_file);
        $this->_send_whatsapp($pendatang->no_wa, $pendatang->nama_lengkap, $path_file);

        $this->session->set_flashdata('success', 'Surat domisili berhasil dikonfirmasi dan dikirim.');

        redirect('pendatang');
    }

    public function _generate_pdf($pendatang, $nomor_surat, $tanggal_terbit, $keterangan, $path_file) {
    // Inisialisasi DomPDF dengan opsi
    $options = new Options();
    $options->set('defaultFont', 'Arial');
    $options->set('isRemoteEnabled', true); // penting kalau kamu pakai gambar/logo

    $dompdf = new Dompdf($options);

    // Susun HTML konten
    $html = '
        <html>
        <head>
            <style>
                body { font-family: Arial, sans-serif; font-size: 12pt; }
                h2 { text-align: center; }
                .content { margin-top: 20px; line-height: 1.6; }
            </style>
        </head>
        <body>
            <h2>SURAT KETERANGAN DOMISILI</h2>
            <p style="text-align:center;">Nomor: ' . $nomor_surat . '</p>

            <div class="content">
                <p>Yang bertanda tangan di bawah ini menerangkan bahwa:</p>
                <table>
                    <tr><td>Nama</td><td>: ' . $pendatang->nama_lengkap . '</td></tr>
                    <tr><td>Alamat</td><td>: ' . $pendatang->alamat_domisili . '</td></tr>
                    <tr><td>Tanggal Terbit</td><td>: ' . date('d-m-Y', strtotime($tanggal_terbit)) . '</td></tr>
                </table>

                <p style="margin-top:15px;">Keterangan tambahan:</p>
                <p>' . $keterangan . '</p>

                <p style="margin-top:30px;">Demikian surat ini dibuat untuk digunakan sebagaimana mestinya.</p>

                <div style="text-align:right; margin-top:50px;">
                    Belitung, ' . date('d F Y', strtotime($tanggal_terbit)) . '<br>
                    Kepala Desa Ibul<br><br><br><br>
                    (_____________________)
                </div>
            </div>
        </body>
        </html>
    ';

    // Generate PDF
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();

    // Simpan ke path tujuan
    file_put_contents($path_file, $dompdf->output());
}


    public function _send_email($email, $nama, $path_file){
        $this->email->from('noreply@desa-ibul-app', 'Surat Domisili Desa Ibul');
        $this->email->to($email);
        $this->email->subject('Surat Domisili Telah Diterbitkan');
        $this->email->message(
            'Halo ' . $nama . ',<br>
            Surat domisili Anda telah berhasil diterbitkan. Silakan unduh surat domisili Anda melalui tautan berikut:<br>
            <a href="' . base_url('uploads/surat_domisili/' . basename($path_file)) . '">Unduh Surat Domisili</a><br><br>
            Terima kasih telah menggunakan layanan kami.'
        );
        $this->email->attach($path_file);
        $this->email->send();
    }

    public function _send_whatsapp($no_wa, $nama, $path_file){
        $file_url = base_url('uploads/surat_domisili/' . basename($path_file));
        $message = "Halo " . $nama . ",\n\n" .
                   "Surat domisili Anda telah berhasil diterbitkan. Silakan unduh surat domisili Anda melalui tautan berikut:\n" .
                   $file_url . "\n\n" .
                   "Terima kasih telah menggunakan layanan kami.";      
        
        $token = "WvfQhHQcZD7S6Pgb1Tfa";
        $data = [
            'target' => $no_wa,
            'message' => $message,
        ];

        $curl = curl_init("https://api.fonnte.com/send");
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($curl, CURLOPT_HTTPHEADER, ["Authorization: $token"]);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_exec($curl);
        curl_close($curl);
    }


}