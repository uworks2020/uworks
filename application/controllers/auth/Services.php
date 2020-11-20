<?php


defined('BASEPATH') or exit('No direct script access allowed');

class services extends CI_Controller
{

    public function index()
    {
        $data = [
            'title'    => 'Services',
            'content'    => 'auth/services/list'


        ];
        $this->load->view('auth/template/list', $data, FALSE);
    }

    public function tabel()
    {
        $services = $this->services_model->listing();
        $data = [
            'services'  => $services
        ];
        $this->load->view('auth/services/tabel', $data, FALSE);
    }

    public function h_tambah()
    {
        $data = [
            'title' => 'Tambah Services',
            'content'   => 'auth/services/tambah'
        ];
        $this->load->view('auth/template/modal', $data, FALSE);
    }

    public function p_tambah()
    {
        if ($this->input->is_ajax_request()) {

            $this->form_validation->set_rules('icon', 'Icon', 'trim|required');
            $this->form_validation->set_rules('judul', 'Judul', 'trim|required');
            $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');


            if ($this->form_validation->run() == FALSE) {
                $data = [
                    'respond'   => 'error',
                    'title' => 'Gagal!',
                    'message'   => validation_errors()
                ];
            } else {
                $post = $this->input->post();
                $proses = $this->services_model->tambah($post);

                if ($proses) {
                    $data = [
                        'respond'   => 'success',
                        'title' => 'Berhasil!',
                        'message'   => 'Berhasil tambah data services!'
                    ];
                } else {
                    $data = [
                        'respond'   => 'error',
                        'title' => 'Gagal!',
                        'message'   => 'Gagal tambah data services!'
                    ];
                }
            }

            echo json_encode($data);
        }
    }

    public function h_edit($id)
    {
        $services = $this->services_model->get($id);
        $data = [
            'title' => 'Edit services ' . $services->judul,
            'content'   => 'auth/services/edit',
            'services'  => $services
        ];
        $this->load->view('auth/template/modal', $data, FALSE);
    }

    public function p_edit($id)
    {
        if ($this->input->is_ajax_request()) {

            $this->form_validation->set_rules('icon', 'Icon', 'trim|required');
            $this->form_validation->set_rules('judul', 'Judul', 'trim|required');
            $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');


            if ($this->form_validation->run() == FALSE) {
                $data = [
                    'respond'   => 'error',
                    'title' => 'Gagal!',
                    'message'   => validation_errors()
                ];
            } else {
                $post = $this->input->post();
                $proses = $this->services_model->edit($id, $post);

                if ($proses) {
                    $data = [
                        'respond'   => 'success',
                        'title' => 'Berhasil!',
                        'message'   => 'Berhasil tambah data services!'
                    ];
                } else {
                    $data = [
                        'respond'   => 'error',
                        'title' => 'Gagal!',
                        'message'   => 'Gagal tambah data services!'
                    ];
                }
            }

            echo json_encode($data);
        }
    }

    public function hapus($id)
    {
        if ($this->input->is_ajax_request()) {
            $proses = $this->services_model->hapus($id);
            if ($proses) {
                $data = [
                    'respond'   => 'success',
                    'title' => 'Berhasil!',
                    'message'   => 'Berhasil tambah data services!'
                ];
            } else {
                $data = [
                    'respond'   => 'error',
                    'title' => 'Gagal!',
                    'message'   => 'Gagal tambah data services!'
                ];
            }

            echo json_encode($data);
        }
    }
}

/* End of file features.php */
