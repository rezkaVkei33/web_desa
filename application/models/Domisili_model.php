<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Domisili_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function get_surat_domisili(){
        return $this->db->get('surat_domisili')->result();
    }

    public function get_pendatang() {
        return $this->db->get('pendatang')->result();
    }

    public function get_pendatang_by_id($id){
        return $this->db->get_where('pendatang', ['id_pendatang' => $id])->row();
    }

    public function get_tambah_pendatang($data) {
        return $this->db->insert('pendatang', $data);
    }
    public function get_status_pendatang($id, $status){
        $this->db->where('id_pendatang', $id);
        return $this->db->update('pendatang', ['status_pengajuan' => $status]);
    }
    public function insert($data){
        return $this->db->insert('surat_domisili',$data);

    }
    public function generate_nomor_surat() {
    $bulanRomawi = ["I","II","III","IV","V","VI","VII","VIII","IX","X","XI","XII"];
    $bulan = date('n'); 
    $tahun = date('Y');

    $this->db->from('surat_domisili');
    $jumlah = $this->db->count_all_results() + 1;

    return str_pad($jumlah, 3, "0", STR_PAD_LEFT) . "/DOM/" . "IBUL/" . $bulanRomawi[$bulan - 1] . "/" . $tahun;
}



}