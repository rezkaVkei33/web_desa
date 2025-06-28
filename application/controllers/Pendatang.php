<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendatang extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Pendatang_model');
    }

    public function index() {
        $data['pendatang'] = $this->Pendatang_model->get_all();
        $this->load->view('administrasi/pendatang/pendatang', $data);
    }
}