<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('M_admin', 'm_admin');
        if ($this->session->userdata('user_level') != "admin") {
            $this->session->sess_destroy();
            redirect(base_url("login"));
        }
    }

    public function index()
    {
        $this->template->load('admin/template', 'admin/laporan');
    }
    function excel()
    {
        $this->load->view('admin/laporan_excel');
    }
}
