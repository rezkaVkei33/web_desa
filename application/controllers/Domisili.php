<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Domisili extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Domisili_model');
        $this->load->library('email');
        
    }
    public function index() {
        $this->load->view('pengajuan/domisili/home_domisili');
    }
    public function surat_domisili() {
        $data['surat_domisili'] = $this->Domisili_model->get_surat_domisili();
        $this->load->view('administrasi/surat_domisili/surat_domisili', $data);
    }
    public function pendatang() {
        $data = array(
            'title' => 'Domisili Pendatang',
            'subtitle' => 'Formulir Pendatang Domisili',
            'isi' => 'Silakan isi formulir berikut dengan lengkap dan benar'
        );
        $this->load->view('pengajuan/domisili/pendatang', $data);
    }
    public function simpan_pendatang(){
        
        $data = array(
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'alamat_asal' => $this->input->post('alamat_asal'),
            'alamat_domisili' => $this->input->post('alamat_domisili'),
            'alasan_pindah' => $this->input->post('alasan_pindah'),
            'no_wa' => $this->input->post('no_wa'),
            'email' => $this->input->post('email'),
            'status_pengajuan' => 'Menunggu Verifikasi',
        );
        
        if($this->Domisili_model->get_tambah_pendatang($data)){
            $this->_send_email($data['email'], $data['nama_lengkap']);
            $this->_send_whatsapp($data['no_wa'], $data['nama_lengkap']);
            $this->session->set_flashdata('success', 'Pengajuan Berhasil. Notifikasi telah dikirim melalui email atau WhatsApp.');
        }else{
            $this->session->set_flashdata('error', 'Pengajuan Gagal. Silahkan coba ulangi ');
        }
        redirect('domisili/pendatang');
    }

    # Fungsi kirim email
    private function _send_email($email,$nama){
        $this->email->from('noreply@desa-ibul-app', 'Domisili Desa Ibul');
        $this->email->to($email);
        $this->email->subject('Surat Domisili Telah di Konfirmasi');
        $this->email->message(
            'Halo ' . $nama . ',<br>
            Pengajuan surat domisili Anda telah berhasil dikirim, dengan data sebagai berikut:<br>
            <strong>Nama Lengkap:</strong> ' . $nama . '<br>
            <strong>Tempat Lahir:</strong> ' . $this->input->post('tempat_lahir') . '<br>
            <strong>Tanggal Lahir:</strong> ' . $this->input->post('tanggal_lahir') . '<br>
            <strong>Jenis Kelamin:</strong> ' . $this->input->post('jenis_kelamin') . '<br>
            <strong>Alamat Asal:</strong> ' . $this->input->post('alamat_asal') . '<br>
            <strong>Alamat Domisili:</strong> ' . $this->input->post('alamat_domisili') . '<br>
            <strong>Alasan Pindah:</strong> ' . $this->input->post('alasan_pindah') . '<br>
            <strong>No WhatsApp:</strong> ' . $this->input->post('no_wa') . '<br>
            <strong>Email:</strong> ' . $email . '<br><br>
            Pengajuan Anda telah diterima dan akan segera diproses oleh pihak desa. 
        <br>Anda akan menerima notifikasi lebih lanjut melalui email atau WhatsApp Anda.
        <br>Jika ada pertanyaan, silakan hubungi kami di nomor WhatsApp resmi desa.
        <br>Terima kasih atas pengajuan Anda.<br><br>
        <strong>Catatan:</strong>
        <br>Pastikan Anda memeriksa email dan WhatsApp Anda secara berkala untuk
        <br>mendapatkan informasi terbaru mengenai status pengajuan Anda. 
        <br>Silahkan tunggu proses verifikasi dari pihak desa.
        <br>Terima kasih.');

        if (!$this->email->send()) {
            log_message('error', 'Email gagal dikirim: ' . $this->email->print_debugger());
        } else {
            log_message('info', 'Email berhasil dikirim ke: ' . $email);
        }
    }

    # Fungsi kirim whatsapp
    private function _send_whatsapp($no_wa, $nama){
    $token = "WvfQhHQcZD7S6Pgb1Tfa";
    $url = "https://api.fonnte.com/send";

    $message = "Halo *$nama*,\nPengajuan surat domisili kamu telah diterima.
                dengan data pengajuan sebagai berikut:\n
                Nama Lengkap: $nama \n
                Tempat Lahir:" . $this->input->post('tempat_lahir') . "\n
                Tanggal Lahir: " . $this->input->post('tanggal_lahir') . "\n
                Jenis Kelamin: " . $this->input->post('jenis_kelamin') . "\n
                Alamat Asal: " . $this->input->post('alamat_asal') . "\n
                Alamat Domisili: " . $this->input->post('alamat_domisili') . "\n
                Alasan Pindah: " . $this->input->post('alasan_pindah') . "\n
                No WhatsApp: $no_wa \n
                Email: " . $this->input->post('email') . "\n\n
                Harap tunggu verifikasi dari admin desa. ya Terima Kasih 🙏";

    $data = array(
        'target' => $no_wa,
        'message' => $message,
    );

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($curl, CURLOPT_HTTPHEADER, [
        "Authorization: $token" 
    ]);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($curl);

    if(curl_errno($curl)){
        log_message('error', 'WA CURL Error: ' . curl_error($curl));
    } else {
        log_message('info', "WA Response: $response");
    }

    curl_close($curl);
}


    public function pindahan() {
        $this->load->view('pengajuan/domisili/pindahan');
    }

}