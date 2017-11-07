<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jurnal extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_jurnal');
    }

    public function index()
    {
        $data['title'] = 'Input Jurnal';
        $data['body_k'] = 'jurnal';
        //$data['suggest'] =

        $this->load->view('template/head', $data);
        $this->load->view('template/body', $data);
        $this->load->view('template/kaki', $data);
    }

    public function test()
    {
        echo "Here's some code";
        echo $this->m_jurnal->get_kode_transaksi();
    }

    public function saran()
    {
        if (isset($_GET['term'])) {
            $q = strtolower($_GET['term']);
            $this->m_jurnal->get_account($q);
        }
    }

    public function add()
    {
        $this->form_validation->set_error_delimiters('<div class="error" style="color:red">', '</div>');
        $this->form_validation->set_message('numeric', '{field} harus angka');
        $this->form_validation->set_message('required', '{field} harus diisi');

        $this->form_validation->set_rules('nama_akun2[]', 'Nama Akun', 'trim|required');
        $this->form_validation->set_rules('posisi[]', 'Posisi', 'trim|required');
        $this->form_validation->set_rules('jumlah[]', 'Jumlah', 'trim|numeric|required');
        $this->form_validation->set_rules('date', 'Tanggal', 'required');
        $this->form_validation->set_rules('uraian', 'Uraian', 'required');

        if ($this->form_validation->run() == false) {
            $this->index();
        } else {
            $jumlah = $this->input->post('jumlah');
            $posisi = $this->input->post('posisi');
            $uraian = $this->input->post('uraian');
            $date = $this->input->post('date');
            $kd_transaksi = $this->m_jurnal->get_kode_transaksi();
            $no_akun = $this->input->post('no_akun2[]');
            $nama_akun = $this->input->post('nama_akun2[]');
            $debit = 0;
            $kredit = 0;


            for ($i=0; $i<count($posisi); $i++) {
                if ($posisi[$i] == 'debit') {
                    $debit = $debit + $jumlah[$i];
                }

                if ($posisi[$i] == 'kredit') {
                    $kredit = $kredit + $jumlah[$i];
                }
            }

            if ($kredit != $debit) {
                echo "Tidak Balance";
            } else {
                $i=0;
                foreach ($nama_akun as $key) {
                    if ($posisi[$i]=='debit') {
                        $debit_p= $jumlah[$i];
                        $kredit_p = 0;
                    }
                    if ($posisi[$i] == 'kredit') {
                        $kredit_p = $jumlah[$i];
                        $debit_p = 0;
                    }
                    $data[] = array(
                                    'kd_transaksi' => $kd_transaksi,
                                    'tgl_jurnal' => $date,
                                    'uraian' => $uraian,
                                    'no_akun2' => $no_akun[$i],
                                    //'posisi'=> $posisi[$i],
                                    'debit' => $debit_p,
                                    'kredit' => $kredit_p

                                );
                    $i++;
                }
                $insert = $this->m_jurnal->jurnal_add($data);

                if ($insert) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success">Berhasil Menambah Data</div>');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger">Gagal Menambah Data</div>');
                }

                redirect('jurnal');
            }
        }
    }
}
