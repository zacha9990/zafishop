<?php
defined('BASEPATH') OR exit('No direct script allowed');

/**
 *
 */
class M_akun_dua extends CI_Model
{
  var $table = 'tb_akun2';

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  public function get_all_akun2() {
    //$this->db->from('tb_akun2');
    //$query=$this->db->get();
    $query=$this->db->query("select * from tb_akun1 inner join tb_akun2 on tb_akun1.no_akun1 = tb_akun2.no_akun1");
    return $query->result();
  }

  public function get_dropdown_no_akun1(){
    $query=$this->db->query("select no_akun1, nama_akun1 from tb_akun1");
    return $query->result();
  }

  public function get_by_id($id){
    $this->db->from($this->table);
    $this->db->where('no_akun2', $id);
    $query=$this->db->get();
    return $query->row();
  }

  public function akun2_add($data) {


    $this->db->insert($this->table, $data);
    $this->db->insert_id();
    if ($this->db->affected_rows() > 0){
      return true;
    }else {
      return false;
    }
  }

  public function akun_update($where, $data){
    $this->db->update($this->table, $data, "no_akun2= $where");
    return $this->db->affected_rows();
  }

  public function delete_by_id($id) {
    $this->db->where('no_akun2' ,$id);
    $this->db->delete($this->table);
  }

  public function ubah_saldo($kode, $data){
    $this->db->where('no_akun2', $kode);
    $this->db->update($this->table, $data);

    if (!is_numeric($data['saldo_awal'])){
      return false;
    }

    if ($this->db->affected_rows() > 0){
      return true;
    }else {
      return false;
    }
  }


}


 ?>
