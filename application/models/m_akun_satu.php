  <?php
defined('BASEPATH') or exit('No direct script allowed');

/**
 *
 */
class M_akun_satu extends CI_Model
{
    public $table = 'tb_akun1';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_akun1()
    {
        $this->db->from('tb_akun1');
        $query=$this->db->get();
        return $query->result();
    }

    public function get_by_id($id)
    {
        $this->db->from($this->table);
        $this->db->where('no_akun1', $id);
        $query=$this->db->get();
        return $query->row();
    }

    public function akun1_add($data)
    {
        $this->db->insert($this->table, $data);
        $this->db->insert_id();
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function akun_update($where, $data)
    {
        $this->db->update($this->table, $data, "no_akun1=$where");
        return $this->db->affected_rows();
    }

    public function delete_by_id($id)
    {
        $this->db->where('no_akun1', $id);
        $this->db->delete($this->table);
    }
}
