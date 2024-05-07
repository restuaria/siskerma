<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Panduan extends CI_Controller
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
        $data['data'] = $this->db->query("SELECT * FROM panduan ")->result();
        $this->template->load('admin/template', 'admin/panduan', $data);
    }
    function proses_tambah()
    {

        $config['upload_path']          = './assets/file/panduan';
        $config['allowed_types']        = 'PDF|pdf|docx';
        $config['max_size']             = 10000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file')) {
            redirect('admin/panduan?alert=gagal');
        } else {
            $file = $this->upload->data();
            $file = $file['file_name'];
            $nama = $this->input->post('nama');
            $dar = array(
                'panduan_nama' => $nama,
                'panduan_file' => $file,
            );
            $this->db->insert('panduan', $dar);


            redirect('admin/panduan?alert=berhasil');
        }
    }
    function proses_editfile($id)
    {
        $config['upload_path']          = './assets/file/panduan';
        $config['allowed_types']        = 'PDF|pdf|docx';
        $config['max_size']             = 10000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file')) {
            $nama = $this->input->post('nama');
            $dar = array(
                'panduan_nama' => $nama,
            );
            $this->db->where('panduan_id', $id);
            $this->db->update('panduan', $dar);
            redirect('admin/panduan?alert=gagal');
        } else {
            $file = $this->upload->data();
            $file = $file['file_name'];
            $nama = $this->input->post('nama');
            $dar = array(
                'panduan_nama' => $nama,
                'panduan_file' => $file,
            );
            $this->db->where('panduan_id', $id);
            $this->db->update('panduan', $dar);
            redirect('admin/panduan?alert=berhasil');
        }
    }
    public function hapusdata($id)
    {
        $where = array('panduan_id' => $id);
        $this->m_admin->hapus($where, 'panduan');
        redirect('admin/panduan?alert=hapus');
    }
}
