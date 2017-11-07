<?php
defined('BASEPATH') or exit('No direct script allowed');

/**
 *
 */
class M_jurnal extends CI_Model
{
    public $table = 'tb_jurnal';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_account($q)
    {
        $this->db->select('*');
        $this->db->like('nama_akun2', $q);
        $query = $this->db->get('tb_akun2');

        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $key) {
                //$new_key['value'] = htmlentities(stripslashes($key['no_akun2']));
                $new_key['label'] = htmlentities(stripslashes($key['nama_akun2']));
                $new_key['coba'] = htmlentities(stripslashes($key['no_akun2']));
                $key_set[] = $new_key;
            }
            echo json_encode($key_set);
        }
    }

    public function get_kode_transaksi($kd='TR')
    {
        $query = "SELECT MID(MAX(kd_transaksi),3,10) as NO_MAX FROM tb_jurnal";
        $data = $this->db->query($query)->result_array();

        if (count($data[0]['NO_MAX']) != "") {
          $n_nol = "";
          $kd_baru = $data[0]['NO_MAX'] + 1;
          for ($i=0; $i < strlen($data[0]['NO_MAX']) -strlen($kd_baru) ; $i++) {
            $n_nol = $n_nol."0";
          }
          return $kd.$n_nol.$kd_baru;
        }else {
          return $kd."000000001";
        }
    }

    public function jurnal_add($data)
    {
      $this->db->insert_batch($this->table, $data);
      //$this->db->insert_id();
      if ($this->db->affected_rows() > 0){
        return true;
      }else {
        return false;
      }
    }
}
