<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
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
        $data['mou'] = $this->db->query("SELECT * FROM arsip where arsip_jenis = '1'")->num_rows();
        $data['mouva'] = $this->db->query("SELECT * FROM arsip where arsip_jenis = '1' and arsip_status = '1' ")->num_rows();
        $data['mouin'] = $this->db->query("SELECT * FROM arsip where arsip_jenis = '1' and arsip_status = '2' ")->num_rows();

        $data['mua'] = $this->db->query("SELECT * FROM arsip where arsip_jenis = '2'")->num_rows();
        $data['muava'] = $this->db->query("SELECT * FROM arsip where arsip_jenis = '2' and arsip_status = '1' ")->num_rows();
        $data['muain'] = $this->db->query("SELECT * FROM arsip where arsip_jenis = '2' and arsip_status = '2' ")->num_rows();

        $data['ia'] = $this->db->query("SELECT * FROM arsip where arsip_jenis = '3'")->num_rows();
        $data['iava'] = $this->db->query("SELECT * FROM arsip where arsip_jenis = '3' and arsip_status = '1' ")->num_rows();
        $data['iain'] = $this->db->query("SELECT * FROM arsip where arsip_jenis = '3' and arsip_status = '2' ")->num_rows();
        $this->template->load('admin/template', 'admin/dashboard', $data);
    }
    function mou()
    {
        $data['title1'] = "Data MOU";
        $data['data'] = $this->db->query("SELECT * FROM arsip where arsip_jenis = '1' order by create_at desc")->result();
        $this->template->load('admin/template', 'admin/v_mou', $data);
    }
    function mouvalid()
    {
        $data['title1'] = "Data MOU Valid";
        $data['data'] = $this->db->query("SELECT * FROM arsip where arsip_jenis = '1' and arsip_status = '1' order by create_at desc")->result();
        $this->template->load('admin/template', 'admin/v_mou', $data);
    }
    function mouinvalid()
    {
        $data['title1'] = "Data MOU Invalid";
        $data['data'] = $this->db->query("SELECT * FROM arsip where arsip_jenis = '1' and arsip_status = '2' order by create_at desc")->result();
        $this->template->load('admin/template', 'admin/v_mou', $data);
    }
    function moa()
    {
        $data['title1'] = "Data MOA";
        $data['data'] = $this->db->query("SELECT * FROM arsip where arsip_jenis = '2' order by create_at desc")->result();
        $this->template->load('admin/template', 'admin/v_mou', $data);
    }
    function moavalid()
    {
        $data['title1'] = "Data MOA Valid";
        $data['data'] = $this->db->query("SELECT * FROM arsip where arsip_jenis = '2' and arsip_status = '1' order by create_at desc")->result();
        $this->template->load('admin/template', 'admin/v_mou', $data);
    }
    function moainvalid()
    {
        $data['title1'] = "Data MOA Invalid";
        $data['data'] = $this->db->query("SELECT * FROM arsip where arsip_jenis = '2' and arsip_status = '2' order by create_at desc")->result();
        $this->template->load('admin/template', 'admin/v_mou', $data);
    }
    function ia()
    {
        $data['title1'] = "Data IA";
        $data['data'] = $this->db->query("SELECT * FROM arsip where arsip_jenis = '3' order by create_at desc")->result();
        $this->template->load('admin/template', 'admin/v_mou', $data);
    }
    function iavalid()
    {
        $data['title1'] = "Data IA Valid";
        $data['data'] = $this->db->query("SELECT * FROM arsip where arsip_jenis = '3' and arsip_status = '1' order by create_at desc")->result();
        $this->template->load('admin/template', 'admin/v_mou', $data);
    }
    function iainvalid()
    {
        $data['title1'] = "Data IA Invalid";
        $data['data'] = $this->db->query("SELECT * FROM arsip where arsip_jenis = '3' and arsip_status = '2' order by create_at desc")->result();
        $this->template->load('admin/template', 'admin/v_mou', $data);
    }
    function valid($id)
    {
        $arsip = $this->db->query("SELECT* FROM arsip where arsip_id = $id")->row();
        if ($arsip->arsip_jenis == '1') {
            $data = [
                'arsip_status' => 1,
                'update_at' => date("Y-m-d H:m:s"),
            ];
            $this->db->where('arsip_id', $id);
            $this->db->update('arsip', $data);
            redirect('admin/dashboard/mou?alert=valid');
        } elseif ($arsip->arsip_jenis == '2') {
            $data = [
                'arsip_status' => 1,
                'update_at' => date("Y-m-d H:m:s"),
            ];
            $this->db->where('arsip_id', $id);
            $this->db->update('arsip', $data);
            redirect('admin/dashboard/moa?alert=valid');
        } else {
            $data = [
                'arsip_status' => 1,
                'update_at' => date("Y-m-d H:m:s"),
            ];
            $this->db->where('arsip_id', $id);
            $this->db->update('arsip', $data);
            redirect('admin/dashboard/ia?alert=valid');
        }
    }
    function invalid($id)
    {
        $arsip = $this->db->query("SELECT* FROM arsip where arsip_id = $id")->row();
        if ($arsip->arsip_jenis == '1') {
            $data = [
                'arsip_status' => 2,
                'update_at' => date("Y-m-d H:m:s"),
            ];
            $this->db->where('arsip_id', $id);
            $this->db->update('arsip', $data);
            redirect('admin/dashboard/mou?alert=invalid');
        } elseif ($arsip->arsip_jenis == '2') {
            $data = [
                'arsip_status' => 2,
                'update_at' => date("Y-m-d H:m:s"),
            ];
            $this->db->where('arsip_id', $id);
            $this->db->update('arsip', $data);
            redirect('admin/dashboard/moa?alert=invalid');
        } else {
            $data = [
                'arsip_status' => 2,
                'update_at' => date("Y-m-d H:m:s"),
            ];
            $this->db->where('arsip_id', $id);
            $this->db->update('arsip', $data);
            redirect('admin/dashboard/ia?alert=invalid');
        }
    }
    function proses_tambah()
    {

        $config['upload_path']          = './assets/file/';
        $config['allowed_types']        = 'PDF|pdf';
        $config['max_size']             = 10000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file')) {
            redirect('admin/dashboard/mou?alert=gagal');
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
                redirect('admin/dashboard/mou?alert=berhasil');
            } elseif ($jenis == 2) {
                redirect('admin/dashboard/moa?alert=berhasil');
            } elseif ($jenis == 3) {
                redirect('admin/dashboard/ia?alert=berhasil');
            }
        }
    }
    function proses_editfile($id)
    {
        $config['upload_path']          = './assets/file/';
        $config['allowed_types']        = 'PDF|pdf';
        $config['max_size']             = 10000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file')) {
            $nama = $this->input->post('nama');
            $jenis = $this->input->post('jenis');
            $user = $this->session->userdata('user_id');
            $dar = array(
                'arsip_nama' => $nama,
                'arsip_jenis' => $jenis,
                'arsip_user' => $user,
                'arsip_status' => '2',
                'create_at' => date("Y-m-d H:m:s")
            );
            $this->db->where('arsip_id', $id);
            $this->db->update('arsip', $dar);

            if ($jenis == 1) {
                redirect('admin/dashboard/mou?alert=berhasil');
            } elseif ($jenis == 2) {
                redirect('admin/dashboard/moa?alert=berhasil');
            } elseif ($jenis == 3) {
                redirect('admin/dashboard/ia?alert=berhasil');
            }
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
            $this->db->where('arsip_id', $id);
            $this->db->update('arsip', $dar);

            if ($jenis == 1) {
                redirect('admin/dashboard/mou?alert=berhasil');
            } elseif ($jenis == 2) {
                redirect('admin/dashboard/moa?alert=berhasil');
            } elseif ($jenis == 3) {
                redirect('admin/dashboard/ia?alert=berhasil');
            }
        }
    }
    public function hapusdata($id)
    {
        $where = array('arsip_id' => $id);
        $this->m_admin->hapus($where, 'arsip');
        redirect('admin/dashboard/mou?alert=hapus');
    }

    function users()
    {
        $data['title1'] = "Data Users";
        $data['data'] = $this->db->query("SELECT * FROM user ")->result();
        $this->template->load('admin/template', 'admin/user', $data);
    }
    function user_tambah()
    {
        $data['title1'] = "Tambah Data User";
        $this->template->load('admin/template', 'admin/user_tambah', $data);
    }
    function user_proses_tambah()
    {
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $foto = $this->input->post('foto');
        $level = $this->input->post('level');

        $config['upload_path']          = './assets/img/';
        $config['allowed_types']        = 'PNG|png|jpg|jpeg';
        $config['max_size']             = 10000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto')) {
            $dar = array(
                'user_nama' => $nama,
                'user_username' => $username,
                'user_password' => md5($password),
                'user_foto' => 'a.jpg',
                'user_level' => $level,
                'create_at' => date("Y-m-d H:m:s")
            );
            $this->db->insert('user', $dar);
            redirect('admin/dashboard/users?alert=berhasil');
        } else {

            $foto = $this->upload->data();
            $config['image_library'] = 'gd2';
            $config['source_image']  = './assets/img/' . $foto["file_name"];
            $config['create_thumb']  = false;
            $config['maintain_ratio'] = false;
            $config['width']         = 420;
            $config['height']        = 654;
            $config['new_image']     = './assets/img/' . $foto["file_name"];
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();

            $dar = array(
                'user_nama' => $nama,
                'user_username' => $username,
                'user_password' => md5($password),
                'user_foto' => $foto["file_name"],
                'user_level' => $level,
                'create_at' => date("Y-m-d H:m:s")
            );
            $this->db->insert('user', $dar);
            redirect('admin/dashboard/users?alert=berhasil');
        }
    }
    public function hapus_user($id)
    {
        $where = array('user_id' => $id);
        $this->m_admin->hapus($where, 'user');
        redirect('admin/dashboard/users?alert=hapus');
    }
    function user_edit($id)
    {
        $data['title1'] = "Edit Data User";
        $data['data'] = $this->db->query("SELECT * FROM user where user_id = $id")->row();
        $this->template->load('admin/template', 'admin/user_edit', $data);
    }
    function user_proses_edit($id)
    {
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $foto = $this->input->post('foto');
        $level = $this->input->post('level');

        if (empty($password)) {
            $config['upload_path']          = './assets/img/';
            $config['allowed_types']        = 'PNG|png|jpg|jpeg';
            $config['max_size']             = 10000;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('foto')) {
                $dar = array(
                    'user_nama' => $nama,
                    'user_username' => $username,
                    'user_foto' => 'a.jpg',
                    'user_level' => $level,
                    'create_at' => date("Y-m-d H:m:s")
                );
                $this->db->where('user_id', $id);
                $this->db->update('user', $dar);
                redirect('admin/dashboard/users?alert=update');
            } else {

                $foto = $this->upload->data();
                $config['image_library'] = 'gd2';
                $config['source_image']  = './assets/img/' . $foto["file_name"];
                $config['create_thumb']  = false;
                $config['maintain_ratio'] = false;
                $config['width']         = 420;
                $config['height']        = 654;
                $config['new_image']     = './assets/img/' . $foto["file_name"];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $dar = array(
                    'user_nama' => $nama,
                    'user_username' => $username,
                    'user_foto' => $foto["file_name"],
                    'user_level' => $level,
                    'create_at' => date("Y-m-d H:m:s")
                );
                $this->db->where('user_id', $id);
                $this->db->update('user', $dar);
                redirect('admin/dashboard/users?alert=update');
            }
        } else {
            $config['upload_path']          = './assets/img/';
            $config['allowed_types']        = 'PNG|png|jpg|jpeg';
            $config['max_size']             = 10000;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('foto')) {
                $dar = array(
                    'user_nama' => $nama,
                    'user_username' => $username,
                    'user_password' => md5($password),
                    'user_foto' => 'a.jpg',
                    'user_level' => $level,
                    'create_at' => date("Y-m-d H:m:s")
                );
                $this->db->where('user_id', $id);
                $this->db->update('user', $dar);
                redirect('admin/dashboard/users?alert=update');
            } else {

                $foto = $this->upload->data();
                $config['image_library'] = 'gd2';
                $config['source_image']  = './assets/img/' . $foto["file_name"];
                $config['create_thumb']  = false;
                $config['maintain_ratio'] = false;
                $config['width']         = 420;
                $config['height']        = 654;
                $config['new_image']     = './assets/img/' . $foto["file_name"];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $dar = array(
                    'user_nama' => $nama,
                    'user_username' => $username,
                    'user_password' => md5($password),
                    'user_foto' => $foto["file_name"],
                    'user_level' => $level,
                    'create_at' => date("Y-m-d H:m:s")
                );
                $this->db->where('user_id', $id);
                $this->db->update('user', $dar);
                redirect('admin/dashboard/users?alert=update');
            }
        }
    }
}
