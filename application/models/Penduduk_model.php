<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penduduk_model extends CI_Model {

    public function get_all() {
        return $this->db->get('penduduk')->result();
    }
    public function get_by_id($id) {
        return $this->db->get_where('penduduk', ['penduduk_id' => $id])->row();
    }
    public function insert($data) {
        return $this->db->insert('penduduk', $data);
    }
    public function update($id, $data) {
        return $this->db->update('penduduk', $data, ['penduduk_id' => $id]);
    }
    public function delete($id) {
        return $this->db->delete('penduduk', ['penduduk_id' => $id]);
    }
    public function nik_exists($nik) {
    $this->db->where('nik', $nik);
    $query = $this->db->get('penduduk', 1);
        return $query->num_rows() > 0;
    }

    public function no_kk_exists($no_kk) {
        $this->db->where('no_kk', $no_kk);
        $query = $this->db->get('penduduk', 1);
        return $query->num_rows() > 0;
    }

}