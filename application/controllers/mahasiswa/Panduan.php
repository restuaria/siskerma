<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Panduan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('M_admin', 'm_admin');
        if ($this->session->userdata('user_level') != "mahasiswa") {
            $this->session->sess_destroy();
            redirect(base_url("login"));
        }
    }

    public function index()
    {
        $data['data'] = $this->db->query("SELECT * FROM panduan ")->result();
        $this->template->load('mahasiswa/template', 'mahasiswa/panduan', $data);
    }
}
