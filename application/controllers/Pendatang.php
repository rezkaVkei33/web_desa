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
        $data['nomor_surat'] = $this->Domisili_model->generate_nomor_surat();
        $this->load->view('administrasi/pendatang/konfirmasi_pendatang', $data);
    }
    public function simpan_surat_domisili(){
        $id_pendatang = $this->input->post('id_pendatang');
        $nomor_surat = $this->Domisili_model->generate_nomor_surat();
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
    $options->set('isRemoteEnabled', true);  //logo

    $dompdf = new Dompdf($options);

    $logo_desa = base_url('assets/img/Logo_Belitung.png');
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
        <div style="text-align: center;">
            <img src="'. $logo_desa .'" style="width:80px; position:absolute; left:20px; top:10px;">
            <h2 style="margin: 0;">PEMERINTAH KABUPATEN BELITUNG</h2>
            <h3 style="margin: 0;">KECAMATAN BADAU DESA IBUL</h3>
            <p style="margin: 0;">Alamat: Jl. Dendang, Badau, Kabupaten Belitung, <br> Kepulauan Bangka Belitung 33451</p>
            <p style="margin: 0;">Telepon: (0719) 123456</p>
            <hr style="border: 2px solid #000;">
        </div>
            <h4 style="text-align:center; text-decoration:underline;">SURAT KETERANGAN DOMISILI</h4>
            <p style="text-align:center;"><i>Nomor: '. $nomor_surat .'</i></p>

            <div class="content">
                <p>Yang bertanda tangan di bawah ini menerangkan bahwa ini, Kepala Desa Ibul, <br>
                Kecamatan Badau, Kabupaten Belitung, menerangkan dengan sebenarnya bahwa:</p>
                <table>
                    <tr><td>Nama</td><td>: ' . $pendatang->nama_lengkap . '</td></tr>
                    <tr><td>Tempat/Tanggal Lahir</td><td>: ' . $pendatang->tempat_lahir . ', ' . date('d M Y', strtotime($pendatang->tanggal_lahir)) . '</td></tr>
                    <tr><td>Jenis Kelamin</td><td>: ' . $pendatang->jenis_kelamin . '</td></tr>
                    <tr><td>Alamat Asal</td><td>: ' . $pendatang->alamat_asal . '</td></tr>
                    <tr><td>Alamat Domisili</td><td>: ' . $pendatang->alamat_domisili . '</td></tr>
                </table>

                <p style="margin-top:15px;">Adalah benar penduduk Desa ' . $pendatang->alamat_asal . ' dan saat ini berdomisili di ' . $pendatang->alamat_domisili . '.</p>
                <p style="margin-top:10px;">Demikian surat ini dibuat untuk digunakan sebagaimana mestinya.</p>

                <table style="width:100%; margin-top:40px;">
                    <tr>
                        <td style="width:33%; text-align:center;"></td>
                        <td style="width:33%; text-align:center;"></td>
                        <td style="width:33%; text-align:center;">
                            Badau, ' . date('d M Y', strtotime($tanggal_terbit)) . '<br>
                            Kepala Desa Ibul,<br><br><br><br>
                            <u><b>Nama Kepala Desa</b></u><br>
                            NIP. 1234567890
                        </td>
                    </tr>
                </table>
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
        $this->email->from('noreply@desa-ibul-app', 'Domisili Desa Ibul');
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