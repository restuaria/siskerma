<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('M_admin', 'm_admin');
        if ($this->session->userdata('user_level') != "dosen") {
            $this->session->sess_destroy();
            redirect(base_url("login"));
        }
    }

    public function index()
    {
        $data['dlmouva'] = $this->db->query("SELECT * FROM arsip where arsip_jenis = '1' and arsip_status = '1' ")->num_rows();
        $data['dlmuava'] = $this->db->query("SELECT * FROM arsip where arsip_jenis = '2' and arsip_status = '1' ")->num_rows();
        $data['dliava'] = $this->db->query("SELECT * FROM arsip where arsip_jenis = '3' and arsip_status = '1' ")->num_rows();

        $id_user =  $this->session->userdata('user_id');

        $data['mou'] = $this->db->query("SELECT * FROM arsip where arsip_jenis = '1' and arsip_user = $id_user")->num_rows();
        $data['mouva'] = $this->db->query("SELECT * FROM arsip where arsip_jenis = '1' and arsip_status = '1' and arsip_user = $id_user ")->num_rows();
        $data['mouin'] = $this->db->query("SELECT * FROM arsip where arsip_jenis = '1' and arsip_status = '2' and arsip_user = $id_user ")->num_rows();

        $data['mua'] = $this->db->query("SELECT * FROM arsip where arsip_jenis = '2' and arsip_user = $id_user")->num_rows();
        $data['muava'] = $this->db->query("SELECT * FROM arsip where arsip_jenis = '2' and arsip_status = '1' and arsip_user = $id_user ")->num_rows();
        $data['muain'] = $this->db->query("SELECT * FROM arsip where arsip_jenis = '2' and arsip_status = '2' and arsip_user = $id_user ")->num_rows();

        $data['ia'] = $this->db->query("SELECT * FROM arsip where arsip_jenis = '3' and arsip_user = $id_user")->num_rows();
        $data['iava'] = $this->db->query("SELECT * FROM arsip where arsip_jenis = '3' and arsip_status = '1' and arsip_user = $id_user ")->num_rows();
        $data['iain'] = $this->db->query("SELECT * FROM arsip where arsip_jenis = '3' and arsip_status = '2' and arsip_user = $id_user ")->num_rows();
        $this->template->load('dosen/template', 'dosen/dashboard', $data);
    }
    function mou()
    {
        $id_user =  $this->session->userdata('user_id');
        $data['title1'] = "Mydata";
        $data['title2'] = "MOU";
        $data['data'] = $this->db->query("SELECT * FROM arsip where arsip_jenis = '1' 
        and arsip_user = $id_user order by create_at desc")->result();
        $this->template->load('dosen/template', 'dosen/v_mou', $data);
    }

    function moa()
    {
        $id_user =  $this->session->userdata('user_id');
        $data['title1'] = "Mydata";
        $data['title2'] = "MOA";
        $data['data'] = $this->db->query("SELECT * FROM arsip where arsip_jenis = '2' 
        and arsip_user = $id_user order by create_at desc")->result();
        $this->template->load('dosen/template', 'dosen/v_mou', $data);
    }

    function ia()
    {
        $id_user =  $this->session->userdata('user_id');
        $data['title1'] = "Mydata";
        $data['title2'] = "IA";
        $data['data'] = $this->db->query("SELECT * FROM arsip where arsip_jenis = '3' 
        and arsip_user = $id_user order by create_at desc")->result();
        $this->template->load('dosen/template', 'dosen/v_mou', $data);
    }
    function dlmou()
    {
        $data['title1'] = "Mydata";
        $data['title2'] = "MOU";
        $data['data'] = $this->db->query("SELECT * FROM arsip where arsip_jenis = '1' and arsip_status = '1'  order by create_at desc")->result();
        $this->template->load('dosen/template', 'dosen/v_dl', $data);
    }

    function dlmoa()
    {
        $data['title1'] = "Mydata";
        $data['title2'] = "MOA";
        $data['data'] = $this->db->query("SELECT * FROM arsip where arsip_jenis = '2' and arsip_status = '1'  order by create_at desc")->result();
        $this->template->load('dosen/template', 'dosen/v_dl', $data);
    }

    function dlia()
    {
        $data['title1'] = "Mydata";
        $data['title2'] = "IA";
        $data['data'] = $this->db->query("SELECT * FROM arsip where arsip_jenis = '3' and arsip_status = '1'  order by create_at desc")->result();
        $this->template->load('dosen/template', 'dosen/v_dl', $data);
    }

    function proses_tambah()
    {
        $config['upload_path']          = './assets/file/';
        $config['allowed_types']        = 'PDF|pdf';
        $config['max_size']             = 10000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file')) {
            redirect('dosen/dashboard/mou?alert=gagal');
        } else {
            $file = $this->upload->data();
            $file = $file['file_name'];
            $nama = $this->input->post('nama');
            $jenis = $this->input->post('jenis');
            $user = $this->session->userdata('user_id');
            $dar = array(
                'arsip_nama' => $nama,
                'arsip_jenis' => $jenis,
                'arsip_user' => $user,
                'arsip_file' => $file,
                'arsip_status' => '2',
                'create_at' => date("Y-m-d H:m:s")
            );
            $this->db->insert('arsip', $dar);

            if ($jenis == 1) {
                redirect('dosen/dashboard/mou?alert=berhasil');
            } elseif ($jenis == 2) {
                redirect('dosen/dashboard/moa?alert=berhasil');
            } elseif ($jenis == 3) {
                redirect('dosen/dashboard/ia?alert=berhasil');
            }
        }
    }
}
