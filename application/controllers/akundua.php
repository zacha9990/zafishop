<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akundua extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('m_akun_dua');
	}

	public function index()
	{
		$data['title'] = 'Data Akun';
    $data['model_obj'] = $this->m_akun_dua;
		$data['body_k'] = "akundua";
		$data['akun_dua']=$this->m_akun_dua->get_all_akun2();

		$this->load->view('template/caput', $data);
        $this->load->view('template/corporis');
        $this->load->view('template/pes');
	}

	public function create(){
		$data['model_obj'] = $this->m_akun_dua;
		$data['title'] = "Input akun";
		$data['body_k'] = "create_akun";
		$this->load->view('template/caput', $data);
        $this->load->view('template/corporis');
        $this->load->view('template/pes');
	}

	public function edit($k){
		$result = $this->m_akun_dua->get_by_id($k);
		$data['akun'] = $result;
		$data['body_k'] = "edit_akun";
		$data['model_obj'] = $this->m_akun_dua;
		$data['title'] = 'Edit Akun';
		$this->load->view('template/caput', $data);
        $this->load->view('template/corporis');
        $this->load->view('template/pes');
	}

	public function add(){
		$this->form_validation->set_error_delimiters('<div class="error" style="color:red">', '</div>');
		$this->form_validation->set_message('numeric', '{field} harus angka');
		$this->form_validation->set_message('required', '{field} harus diisi');

		$this->form_validation->set_rules('no_akun2', 'No Kelompok Akun',
            'trim|required|numeric');
		$this->form_validation->set_rules('nama_akun2', 'Nama Kelompok Akun',
				    'trim|required');

		if ($this->form_validation->run() == false){
			$this->create();
		}else{
				$data =	 array(
					'no_akun2'=>$this->input->post('no_akun2'),
					'nama_akun2'=>$this->input->post('nama_akun2'),
					'no_akun1'=>$this->input->post('no_akun1'),
				);

				$insert = $this->m_akun_dua->akun2_add($data);
				if ($insert)
					$this->session->set_flashdata('message', '<div class="alert alert-success">Berhasil Menambah Data</div>');
				else
					$this->session->set_flashdata('message', '<div class="alert alert-danger">Gagal Menambah Data</div>');

				redirect('akundua');
		}
	}

	public function ubah(){
		$this->form_validation->set_error_delimiters('<div class="error" style="color:red">', '</div>');
		$this->form_validation->set_message('numeric', '{field} harus angka');
		$this->form_validation->set_message('required', '{field} harus diisi');

		// set rules
		$this->form_validation->set_rules('no_akun2', 'No Kelompok Akun',
            'trim|required|numeric');
		$this->form_validation->set_rules('nama_akun2', 'Nama Kelompok Akun','trim|required');

		if ($this->form_validation->run() == false){
				$this->edit($this->input->post('no_akun2'));
		}else{
			$id = $this->input->post('no_akun2');
			$data =	 array(

					'nama_akun2'=>$this->input->post('nama_akun2'),
					'no_akun1'=>$this->input->post('no_akun1'),
				);

				$edit = $this->m_akun_dua->akun_update($id, $data);
				if ($edit)
					$this->session->set_flashdata('message', '<div class="alert alert-success">Berhasil Mengubah Data</div>');
				else
					$this->session->set_flashdata('message', '<div class="alert alert-danger">Gagal Mengubah Data '.$this->db->last_query().'</div>');

				redirect('akundua');
		}

	}

	public function akun2_add() {
		$data =	 array(
			'no_akun2'=>$this->input->post('id'),
			'nama_akun2'=>$this->input->post('nama_akun1'),
			'no_akun1'=>$this->input->post('no_akun1'),
		);

		$insert = $this->m_akun_dua->akun2_add($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_edit($id){
		$data = $this->m_akun_dua->get_by_id($id);

		echo json_encode($data);
	}

	public function akun2_update(){
		$data = array(
			'no_akun2'=>$this->input->post('no_akun2'),
			'nama_akun2'=>$this->input->post('nama_akun2'),
			'no_akun1'=>$this->input->post('no_akun1'),
		);
		$this->m_akun_dua->akun_update(array('no_akun2' => $this->input->post('no_akun2')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function akun2_delete($id) {
		$this->m_akun_dua->delete_by_id($id);
		echo json_encode(array("status"=>TRUE));
	}

	public function test() {
    $this->load->view('test_page');
  }
}
