<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Desa extends CI_Controller {

	public function index()
	{
		$this->load->view('web_desa');
	}
}
