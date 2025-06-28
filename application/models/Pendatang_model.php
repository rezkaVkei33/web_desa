<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendatang_model extends CI_Model {

    public function get_all() {
        return $this->db->get('pendatang')->result();
    }

    public function get_by_id($id) {
        return $this->db->get_where('pendatang', ['id_pendatang' => $id])->row();
    }

    public function insert($data) {
        return $this->db->insert('pendatang', $data);
    }

    public function update($id, $data) {
        $this->db->where('id_pendatang', $id);
        return $this->db->update('pendatang', $data);
    }

    public function delete($id) {
        $this->db->where('id_pendatang', $id);
        return $this->db->delete('pendatang');
    }
}