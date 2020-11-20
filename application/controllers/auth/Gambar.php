<?php


defined('BASEPATH') or exit('No direct script access allowed');

class gambar extends CI_Controller
{

    public function hapus($id)
    {

        if ($this->input->is_ajax_request()) {

            $gambar = $this->gambar_model->get($id);
            $file = $gambar->file;
            $folder = 'client';
            $this->upload_config->hapus_file($folder, $file);
            $proses = $this->gambar_model->hapus($id);
            if ($proses) {
                $data = [
                    'respond'   => 'success',
                    'message'   => 'Berhasil hapus gambar!'
                ];
            } else {
                $data = [
                    'respond'   => 'error',
                    'message'   => 'Gagal hapus database gambar!'
                ];
            }



            echo json_encode($data);
        }
    }

    public function set()
    {
        if($this->input->is_ajax_request()){

            $id_gambar = $this->input->post('id');
            $id_client = $this->input->post('id_client');

            $gambar = $this->gambar_model->get($id_gambar);
            $namafile = $gambar->file;
            $proses = $this->client_model->updategambar($id_client,$namafile);
            if ($proses) {
                $data = [
                    'respond'   => 'success',
                    'message'   => 'Berhasil setting gambar!'
                ];
            } else {
                $data = [
                    'respond'   => 'error',
                    'message'   => 'Gagal setting gambar!'
                ];
            }

            echo json_encode($data);
        }
    }
}

/* End of file gambar.php */
