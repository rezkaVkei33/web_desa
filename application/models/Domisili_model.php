<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Domisili_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
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
        return $this->db->update('pendatang', ['status' => $status]);
    }


}