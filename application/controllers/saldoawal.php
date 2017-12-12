<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Saldoawal extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('m_akun_dua');
	}

	public function index()
	{
        $data['title'] = "Saldo Awal";
        $data['body_k'] = "saldoawal";
        $data['akun_dua']=$this->m_akun_dua->get_all_akun2();

		$this->load->view('template/caput', $data);
        $this->load->view('template/corporis');
        $this->load->view('template/pes');
	}

	
}
