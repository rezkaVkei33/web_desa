<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelahiran extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Kelahiran_model');
        $this->load->model('Penduduk_model');
    }

    public function index() {
        $data = array(
            'title' => 'Data Kelahiran',
            'subtitle' => 'Formulir Pengajuan Akta Kelahiran',
            'isi' => 'Silakan isi formulir berikut dengan lengkap dan benar',
            'kelahiran' => $this->Kelahiran_model->get_all(),
            'penduduk' => $this->Penduduk_model->get_all()
        );
        $this->load->view('pengajuan/kelahiran/kelahiran', $data);
    }
    public function simpan_akta() {
    $data = array(
        'nama_bayi'      => $this->input->post('nama_bayi'),
        'tempat_lahir'   => $this->input->post('tempat_lahir'),
        'tanggal_lahir'  => $this->input->post('tanggal_lahir'),
        'no_wa'          => $this->input->post('no_wa'),
        'email'          => $this->input->post('email'),
        'jenis_kelamin'  => $this->input->post('jenis_kelamin'),
        'ayah_id'        => $this->input->post('ayah_id'),
        'ibu_id'         => $this->input->post('ibu_id')
    );

    if($this->Kelahiran_model->insert($data)){
        $this->_send_email($data['email'], $data);
        $this->_send_whatsapp($data['no_wa'], $data);
        $this->session->set_flashdata('success', 'Pengajuan Berhasil. Notifikasi telah dikirim melalui email atau WhatsApp.');
    }else{
        $this->session->set_flashdata('error', 'Pengajuan Gagal. Silahkan coba ulangi ');
    }
    redirect('warga/kelahiran');
}

private function _send_email($email, $data){
    $this->email->from('noreply@desa-ibul-app', 'Kelahiran Desa Ibul');
    $this->email->to($email);
    $this->email->subject('Pengajuan Akta Kelahiran Telah Diterima');
    $this->email->message(
        'Halo,<br>
        Pengajuan akta kelahiran telah berhasil dikirim, dengan data sebagai berikut:<br>
        <strong>Nama Bayi:</strong> ' . $data['nama_bayi'] . '<br>
        <strong>Tempat Lahir:</strong> ' . $data['tempat_lahir'] . '<br>
        <strong>Tanggal Lahir:</strong> ' . $data['tanggal_lahir'] . '<br>
        <strong>Jenis Kelamin:</strong> ' . $data['jenis_kelamin'] . '<br>
        <strong>No WhatsApp:</strong> ' . $data['no_wa'] . '<br>
        <strong>Email:</strong> ' . $email . '<br><br>
        Pengajuan Anda telah diterima dan akan segera diproses oleh pihak desa.<br>
        Silakan cek email atau WhatsApp Anda untuk informasi lebih lanjut.<br>
        Terima kasih.'
    );

    if (!$this->email->send()) {
        log_message('error', 'Email gagal dikirim: ' . $this->email->print_debugger());
    } else {
        log_message('info', 'Email berhasil dikirim ke: ' . $email);
    }
}

private function _send_whatsapp($no_wa, $data){
    $token = "WvfQhHQcZD7S6Pgb1Tfa";
    $url = "https://api.fonnte.com/send";

    $message = "Halo,\nPengajuan akta kelahiran telah diterima dengan data sebagai berikut:\n"
        . "Nama Bayi: {$data['nama_bayi']}\n"
        . "Tempat Lahir: {$data['tempat_lahir']}\n"
        . "Tanggal Lahir: {$data['tanggal_lahir']}\n"
        . "Jenis Kelamin: {$data['jenis_kelamin']}\n"
        . "No WhatsApp: {$data['no_wa']}\n"
        . "Email: {$data['email']}\n\n"
        . "Pengajuan Anda akan segera diproses oleh pihak desa. Terima kasih.";

    $payload = array(
        'target' => $no_wa,
        'message' => $message,
    );

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($payload));
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

}