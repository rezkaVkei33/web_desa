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
    public function pendatang() {
        $this->load->view('pengajuan/domisili/pendatang');
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
        $this->email->message('Halo ' . $nama . ',<br>Pengajuan surat domisili Anda telah berhasil dikirim. 
        Silahkan tunggu proses verifikasi dari pihak desa.
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

    $message = "Halo *$nama*,\nPengajuan surat domisili kamu telah diterima. Harap tunggu verifikasi dari admin desa ya 🙏";

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