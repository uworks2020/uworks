<?php


defined('BASEPATH') or exit('No direct script access allowed');

class portofolio extends CI_Controller
{

    public function index($id)
    {
        $client = $this->client_model->get($id);
        $gambar = $this->gambar_model->listing($id);
        $data = [
            'title' => 'Portofolio ' . $client->nama,
            'client'    => $client,
            'gambar'    => $gambar

        ];
        $this->load->view('front/portofolio', $data, FALSE);
    }

    public function detail($id)
    { {
            $client = $this->client_model->get($id);
            $gambar = $this->gambar_model->listing($id);
            $data = [
                'title' => 'Portofolio ' . $client->nama,
                'isi'   => 'front/portofolio',
                'gambar'    => $gambar,
                'client'    => $client

            ];
            $this->load->view('front/layout', $data, FALSE);
        }
    }
}

/* End of file portofolio.php */
