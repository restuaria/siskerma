<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{
    //Login
    public function __construct()
    {
        parent::__construct();
        // $this->db2 = $this->load->database('unibi101', TRUE);
    }

    function cek_login($table, $where)
    {
        return $this->db->get_where($table, $where);
    }

    function update_data($where, $dataaa, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $dataaa);
    }
    function hapus($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
