<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penduduk extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Penduduk_model');
        $this->load->helper('text');
    }

    public function index() {
        $data['penduduk'] = $this->Penduduk_model->get_all();
        $this->load->view('administrasi/penduduk/penduduk', $data);
    }
    public function tambah_penduduk(){
        $this->load->view('administrasi/penduduk/tambah_penduduk');
    }
    public function simpan_penduduk() {
    $data = array(
        'nik'               => $this->input->post('nik'),
        'nama_lengkap'      => $this->input->post('nama_lengkap'),
        'tempat_lahir'      => $this->input->post('tempat_lahir'),
        'tanggal_lahir'     => $this->input->post('tanggal_lahir'),
        'jenis_kelamin'     => $this->input->post('jenis_kelamin'),
        'alamat'            => $this->input->post('alamat'),
        'agama'             => $this->input->post('agama'),
        'status_perkawinan' => $this->input->post('status_perkawinan'),
        'pendidikan'        => $this->input->post('pendidikan'),
        'pekerjaan'         => $this->input->post('pekerjaan'),
        'kewarganegaraan'   => $this->input->post('kewarganegaraan'),
        'no_kk'             => $this->input->post('no_kk'),
        'tanggal_update'        => date('Y-m-d H:i:s')
    );

    if (empty($data['nik']) || empty($data['nama_lengkap'])) {
        $this->session->set_flashdata('error', 'NIK dan Nama Lengkap harus diisi.');
        redirect('penduduk/tambah_penduduk');
        return;
    }

    if ($this->Penduduk_model->nik_exists($data['nik'])) {
        $this->session->set_flashdata('error', 'NIK sudah terdaftar.');
        redirect('penduduk/tambah_penduduk');
        return;
    }

    if ($this->Penduduk_model->no_kk_exists($data['no_kk'])) {
        $this->session->set_flashdata('error', 'Nomor KK sudah terdaftar.');
        redirect('penduduk/tambah_penduduk');
        return;
    }

    $this->Penduduk_model->insert($data);
    $this->session->set_flashdata('success', 'Data penduduk berhasil ditambahkan.');
    redirect('penduduk');
    }
    private function parse_alamat($alamat) {
        $parts = explode(',', $alamat);
        return [
            'jalan' => isset($parts[0]) ? trim($parts[0]) : '',
            'desa' => isset($parts[1]) ? trim($parts[1]) : '',
            'kecamatan' => isset($parts[2]) ? str_replace('Kec.', '', trim($parts[2])) : '',
            'kabupaten' => isset($parts[3]) ? str_replace('Kab.', '', trim($parts[3])) : ''
        ];
    }

    public function ubah_penduduk($id) {
        $data['penduduk'] = $this->Penduduk_model->get_by_id($id);
        if (!$data['penduduk']) {
            show_404();
        }
        if (!empty($data['penduduk']->alamat)) {
        $data['alamat_data'] = $this->parse_alamat($data['penduduk']->alamat);
    }
        $this->load->view('administrasi/penduduk/ubah_penduduk', $data);
    }

    public function update($id) {
        $data = array(
            'nik'               => $this->input->post('nik'),
            'nama_lengkap'      => $this->input->post('nama_lengkap'),
            'tempat_lahir'      => $this->input->post('tempat_lahir'),
            'tanggal_lahir'     => $this->input->post('tanggal_lahir'),
            'jenis_kelamin'     => $this->input->post('jenis_kelamin'),
            'alamat'            => $this->input->post('alamat'),
            'agama'             => $this->input->post('agama'),
            'status_perkawinan' => $this->input->post('status_perkawinan'),
            'pendidikan'        => $this->input->post('pendidikan'),
            'pekerjaan'         => $this->input->post('pekerjaan'),
            'kewarganegaraan'   => $this->input->post('kewarganegaraan'),
            'no_kk'             => $this->input->post('no_kk'),
            'tanggal_update'    => date('Y-m-d H:i:s')
        );         

        $this->Penduduk_model->update($id, $data);
        $this->session->set_flashdata('success', 'Data penduduk berhasil diupdate.');
        redirect('penduduk');
    }
    public function delete($id) {
        $this->Penduduk_model->delete($id);
        $this->session->set_flashdata('success', 'Data penduduk berhasil dihapus.');
        redirect('penduduk');
    }
    public function detail($id) {
        $data['penduduk'] = $this->Penduduk_model->get_by_id($id);
        if (!$data['penduduk']) {
            show_404();
        }
        $this->load->view('administrasi/penduduk/detail_penduduk', $data);
    }
}