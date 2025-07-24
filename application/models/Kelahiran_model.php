<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelahiran_model extends CI_Model {

    public function get_all() {
        return $this->db->get('kelahiran')->result();
    }

    public function get_kelahiran_id($id) {
        return $this->db->get_where('kelahiran', ['id_kelahiran' => $id])->row();
    }

    public function insert($data) {
        return $this->db->insert('kelahiran', $data);
    }

    public function update($id, $data) {
        $this->db->where('id_kelahiran', id);
        return $this->db->update('kelahiran', $data);
    }

    public function delete($id) {
        $this->db->where('id_kelahiran', $id);
        return $this->db->delete('kelahiran');
    }
}