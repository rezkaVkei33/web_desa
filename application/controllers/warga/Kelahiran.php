<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelahiran extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Kelahiran_model');
    }

    public function index() {
        $data['kelahiran'] = $this->Kelahiran_model->get_all();
        $this->load->view('pengajuan/kelahiran/kelahiran', $data);
    }
}