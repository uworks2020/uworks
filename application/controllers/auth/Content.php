<?php


defined('BASEPATH') or exit('No direct script access allowed');

class content extends CI_Controller
{

    
    public function __construct()
    {
        parent::__construct();
        if(!$this->session->has_userdata('email')){
			redirect(base_url('auth/login'));
        }
        $this->load->helper('form_helper');
        
    }
    

    public function index()
    {
        $data = [
            'title' => 'Content',
            'content'   => 'auth/content/list'
        ];
        $this->load->view('auth/template/list', $data, FALSE);
    }

    public function tabel_content()
    {
        $content = $this->content_model->listing();
        $data = [
            'content'    => $content
        ];
        $this->load->view('auth/content/tabel', $data, FALSE);
    }

    public function h_tambah()
    {
        $data = [
            'title' => 'Tambah Content',
            'content'   => 'auth/content/tambah'
        ];
        $this->load->view('auth/template/modal', $data, FALSE);
    }

    public function p_tambah()
    {
        if ($this->input->is_ajax_request()) {
            $this->form_validation->set_rules('nama', 'Nama Content', 'trim|required');
            // $this->form_validation->set_rules('isi', 'Isi Content', 'trim|required');


            if ($this->form_validation->run() == FALSE) {
                $data = [
                    'respond'   => 'validasi_error',
                    'message'   => 'Lengkapi form!'
                ];
            } else {

                $post = $this->input->post();
                $proses = $this->content_model->tambah($post);
                if ($proses) {
                    $data = [
                        'respond'   => 'success',
                        'message'   => 'Berhasil tambah content'
                    ];
                } else {
                    $data = [
                        'respond'   => 'error',
                        'message'   => 'Gagal tambah content'
                    ];
                }
            }
            echo json_encode($data);
        }
    }

    public function gambar($id)
    {
        $content = $this->content_model->get($id);
        $data = [
            'title' => 'Edit Gambar ' . $content->nama,
            'content'   => 'auth/content/gambar',
            'konten'    => $content
        ];
        $this->load->view('auth/template/modal', $data, FALSE);
    }

    public function hapus($id)
    {
        if ($this->input->is_ajax_request()) {

            $detailcontent = $this->content_model->get($id);
            if ($detailcontent->gambar != 'default.png') {

                $file1 = 'assets/img/upload/content/' . $detailcontent->gambar;
                $file2 = 'assets/img/upload/content/thumbs/' . $detailcontent->gambar;
                $file3 = 'assets/img/upload/content/thumbs/cropped/' . $detailcontent->gambar;
                $file4 = 'assets/img/upload/content/cropped/' . $detailcontent->gambar;

                if (file_exists($file1)) {
                    unlink($file1);
                }
                if (file_exists($file2)) {
                    unlink($file2);
                }
                if (file_exists($file3)) {
                    unlink($file3);
                }
                if (file_exists($file4)) {
                    unlink($file4);
                }
            }

            $proses = $this->content_model->hapus($id);
            if ($proses) {
                $data = [
                    'respond'   => 'success',
                    'message'   => 'Berhasil hapus data content'
                ];
            } else {
                $data = [
                    'respond'   => 'error',
                    'message'   => 'Gagal hapus data content'
                ];
            }

            echo json_encode($data);
        }
    }

    public function h_edit($id)
    {
        $content = $this->content_model->get($id);
        $data = [
            'title' => 'Edit Content ' . $content->nama,
            'content'    => 'auth/content/edit',
            'konten' => $content
        ];
        $this->load->view('auth/template/modal', $data, FALSE);
    }

    public function p_edit()
    {
        if ($this->input->is_ajax_request()) {

            $post = $this->input->post();
            $proses = $this->content_model->edit($post);
            if ($proses) {
                $data = [
                    'respond'	=> 'success',
                    'message'	=> 'Berhasil edit data content'
                ];
            } else {
                $data = [
                    'respond'	=> 'error',
                    'message'	=> 'Gagal edit data content'
                ];
            }

            echo json_encode($data);
        }
    }
}

/* End of file content.php */
