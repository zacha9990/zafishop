<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akunsatu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_akun_satu');
    }

    public function index()
    {
        $data['akun_satu']=$this->m_akun_satu->get_all_akun1();
        $data['title'] = 'Data Kelompok akun';
        $data['body_k'] = "akunsatu";
        $this->load->view('template/caput', $data);
        $this->load->view('template/corporis');
        $this->load->view('template/pes');
    }

    public function add()
    {
        $this->form_validation->set_error_delimiters('<div class="error" style="color:red">', '</div>');
        $this->form_validation->set_message('numeric', '{field} harus angka');
        $this->form_validation->set_message('required', '{field} harus diisi');

        // set rules
        $this->form_validation->set_rules(
            'no_akun1',
            'No Kelompok Akun',
            'trim|required|numeric'
        );
        $this->form_validation->set_rules(
            'nama_akun1',
            'Nama Kelompok Akun',
                    'trim|required'
        );

        if ($this->form_validation->run() == false) {
            $this->create();
        } else {
            $data =     array(
                'no_akun1'=>$this->input->post('no_akun1'),
                'nama_akun1'=>$this->input->post('nama_akun1'),
                'posisi'=>$this->input->post('posisi'),
            );

            $insert = $this->m_akun_satu->akun1_add($data);
            if ($insert) {
                $this->session->set_flashdata('message', '<div class="alert alert-success">Berhasil Menambah Data</div>');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger">Gagal Menambah Data</div>');
            }

            redirect('akunsatu');
        }
    }

    public function ubah()
    {
        $this->form_validation->set_error_delimiters('<div class="error" style="color:red">', '</div>');
        $this->form_validation->set_message('numeric', '{field} harus angka');
        $this->form_validation->set_message('required', '{field} harus diisi');

        // set rules
        $this->form_validation->set_rules(
            'no_akun1',
            'No Kelompok Akun',
            'trim|required|numeric'
        );
        $this->form_validation->set_rules(
            'nama_akun1',
            'Nama Kelompok Akun',
                    'trim|required'
        );

        if ($this->form_validation->run() == false) {
            $this->edit($this->input->post('no_akun1'));
        } else {
            $id = $this->input->post('no_akun1');
            $data =     array(

                    'nama_akun1'=>$this->input->post('nama_akun1'),
                    'posisi'=>$this->input->post('posisi'),
                );

            $edit = $this->m_akun_satu->akun_update($id, $data);
            if ($edit) {
                $this->session->set_flashdata('message', '<div class="alert alert-success">Berhasil Mengubah Data</div>');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger">Gagal Mengubah Data</div>');
            }

            redirect('akunsatu');
        }
    }

    public function ajax_edit($id)
    {
        $data = $this->m_akun_satu->get_by_id($id);

        echo json_encode($data);
    }

    public function akun1_update()
    {
        $data = array(
            'no_akun1'=>$this->input->post('no_akun1'),
            'nama_akun1'=>$this->input->post('nama_akun1'),
            'posisi'=>$this->input->post('posisi'),
        );
        $this->m_akun_satu->akun_update(array('no_akun1' => $this->input->post('no_akun1')), $data);
        echo json_encode(array("status" => true));
    }

    public function akun1_delete($id)
    {
        $this->m_akun_satu->delete_by_id($id);
        echo json_encode(array("status"=>true));
    }

    public function test()
    {
        $this->load->view('test_page');
    }

    public function create()
    {
        $data['title'] = "Input kelompok akun";
        $data['body_k'] = "create_kelompok_akun";
        $this->load->view('template/head', $data);
        $this->load->view('template/body');
        $this->load->view('template/kaki');
    }

    public function edit($k)
    {
        $result = $this->m_akun_satu->get_by_id($k);
        $data['akun'] = $result;
        $data['body_k'] = "edit_kelompok_akun";
        $data['title'] = 'Edit Kelompok Akun';
        $this->load->view('template/head', $data);
        $this->load->view('template/body');
        $this->load->view('template/kaki');
    }
}
