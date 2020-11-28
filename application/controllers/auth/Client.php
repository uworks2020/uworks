<?php


defined('BASEPATH') or exit('No direct script access allowed');

class client extends CI_Controller
{

    public function index()
    {

        $data = [
            'title' => 'Client',
            'content'   => 'auth/client/list'

        ];
        $this->load->view('auth/template/list', $data, FALSE);
    }

    public function tabel()
    {
        $client = $this->client_model->listing();
        $data = [
            'title' => 'Table Client',
            'client'    => $client
        ];
        $this->load->view('auth/client/tabel', $data, FALSE);
    }

    public function h_tambah()
    {
        $data = [
            'title' => 'Tambah Client',
            'content'   => 'auth/client/tambah'
        ];
        $this->load->view('auth/template/modal', $data, FALSE);
    }

    public function p_tambah()
    {
        if ($this->input->is_ajax_request()) {
            $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
            $this->form_validation->set_rules('lembaga', 'lembaga', 'trim|required');
            $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');


            if ($this->form_validation->run() == FALSE) {
                $data = [
                    'respond'   => 'error',
                    'message'   => 'Lengkapi form!'
                ];
            } else {
                $post = $this->input->post();
                $proses = $this->client_model->tambah($post);
                if ($proses) {
                    $data = [
                        'respond'   => 'success',
                        'message'   => 'Berhasil tambah data client'
                    ];
                } else {
                    $data = [
                        'respond'   => 'error',
                        'message'   => 'Gagal tambah data client'
                    ];
                }
            }
            echo json_encode($data);
        }
    }

    public function hapus()
    {
        if ($this->input->is_ajax_request()) {
            $id = $this->input->post('id');
            $client = $this->client_model->get($id);
            $this->upload_config->hapus_file('client', $client->logo);
            $this->upload_config->hapus_file('client', $client->gambar);
            $proses = $this->client_model->hapus($id);
            $proses_testimoni = $this->client_model->hapus_testimoni($id);
            if ($proses) {
                if ($proses_testimoni) {
                    $data = [
                        'respond'   => 'success',
                        'title' => 'Berhasil!',
                        'message'   => 'Berhasil hapus data client'
                    ];
                } else {
                    $data = [
                        'respond'   => 'error',
                        'title' => 'Gagal!',
                        'message'   => 'Gagal hapus data testimoni'
                    ];
                }
            } else {
                $data = [
                    'respond'   => 'error',
                    'title' => 'Gagal!',
                    'message'   => 'Gagal hapus data client'
                ];
            }
            echo json_encode($data);
        }
    }

    public function h_edit($id)
    {
        $client = $this->client_model->get($id);
        $data = [
            'title' => 'Edit Data Client ' . $client->nama,
            'client' => $client,
            'content'   => 'auth/client/edit'
        ];
        $this->load->view('auth/template/modal', $data, FALSE);
    }

    public function p_edit($id)
    {
        if ($this->input->is_ajax_request()) {
            $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
            $this->form_validation->set_rules('lembaga', 'lembaga', 'trim|required');
            $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');


            if ($this->form_validation->run() == FALSE) {
                $data = [
                    'respond'   => 'error',
                    'message'   => 'Lengkapi form!'
                ];
            } else {

                $post = $this->input->post();
                $proses = $this->client_model->edit($id, $post);
                if ($proses) {
                    $data = [
                        'respond'   => 'success',
                        'message'   => 'Berhasil memperbarui data client'
                    ];
                } else {
                    $data = [
                        'respond'   => 'error',
                        'message'   => 'Gagal memperbarui data client'
                    ];
                }
            }
            echo json_encode($data);
        }
    }

    public function logo($id)
    {
        $client = $this->client_model->get($id);
        $data = [
            'title' => 'Edit Logo ' . $client->nama,
            'content'   => 'auth/client/logo',
            'client'    => $client
        ];
        $this->load->view('auth/template/modal', $data, FALSE);
    }

    public function gambar($id)
    {
        $gambar = $this->gambar_model->listing($id);
        $client = $this->client_model->get($id);
        $data = [
            'title' => 'Edit Gambar ' . $client->nama,
            'content'   => 'auth/client/gambar',
            'client'    => $client,
            'gambar'    => $gambar
        ];
        $this->load->view('auth/template/modal', $data, FALSE);
    }
}

/* End of file client.php */
