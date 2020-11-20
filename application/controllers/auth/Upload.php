<?php



defined('BASEPATH') or exit('No direct script access allowed');

class upload extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->library('upload_config');
    }



    public function team($id)
    {
        if ($this->input->is_ajax_request()) {

            $detailteam = $this->team_model->get($id);
            $folder = 'team';
            $old_file = $detailteam->gambar;

            $this->upload_config->hapus_file($folder, $old_file);

            $config['upload_path'] = './assets/img/upload/'.$folder.'/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']  = '4000';
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar')) {
                $data = [
                    'respond'   => 'error',
                    'message' => $this->upload->display_errors()
                ];
            } else {
                $data = [
                    'upload_data' => $this->upload->data(),
                    'respond'   => 'success',
                    'message' => 'Gambar berhasil di-upload'

                ];
                $upload = $this->upload->data();
                $this->upload_config->config($folder, $upload);

                $team = [
                    'gambar'        => $upload['file_name']
                ];
                $this->db->where('id', $id);
                $this->db->update('team', $team);
            }
            echo json_encode($data);
        }
    }




    public function content($id)
    {
        if ($this->input->is_ajax_request()) {

            $detailcontent = $this->content_model->get($id);
            $oldfile = $detailcontent->gambar;
            $folder = 'content';
            $this->upload_config->hapus_file($folder, $oldfile);


            $config['upload_path'] = './assets/img/upload/'.$folder.'/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']  = '4000';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar')) {
                $data = [
                    'respond'   => 'error',
                    'message' => $this->upload->display_errors()
                ];
            } else {
                $data = [
                    'upload_data' => $this->upload->data(),
                    'respond'   => 'success',
                    'message' => 'Gambar berhasil di-upload'

                ];
                $upload = $this->upload->data();
                $this->upload_config->config($folder, $upload);

                $content = [
                    'gambar'        => $upload['file_name']
                ];
                $this->db->where('id', $id);
                $this->db->update('content', $content);
            }
            echo json_encode($data);
        }
    }

    public function testimoni($id)
    {
        if ($this->input->is_ajax_request()) {

            $testimoni = $this->testimoni_model->get($id);
            $oldfile = $testimoni->foto;
            $folder = 'testimoni';
            $this->upload_config->hapus_file($folder, $oldfile);


            $config['upload_path'] = './assets/img/upload/'.$folder.'/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']  = '4000';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('foto')) {
                $data = [
                    'respond'   => 'error',
                    'title' => 'Gagal!',
                    'message' => $this->upload->display_errors()
                ];
            } else {
                $data = [
                    'upload_data' => $this->upload->data(),
                    'respond'   => 'success',
                    'title' => 'Berhasil!',
                    'message' => 'Gambar berhasil di-upload'

                ];
                $upload = $this->upload->data();
                $this->upload_config->config($folder, $upload);

                $content = [
                    'foto'        => $upload['file_name']
                ];
                $this->db->where('id', $id);
                $this->db->update('testimoni', $content);
            }
            echo json_encode($data);
        }
    }

    public function icon()
    {
        if ($this->input->is_ajax_request()) {

            $site = $this->site_model->listing();
            $oldfile = $site->icon;
            $folder = 'config';
            $this->upload_config->hapus_file($folder, $oldfile);


            $config['upload_path'] = './assets/img/upload/'.$folder.'/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']  = '4000';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('icon')) {
                $data = [
                    'respond'   => 'error',
                    'message' => $this->upload->display_errors()
                ];
            } else {
                $data = [
                    'upload_data' => $this->upload->data(),
                    'respond'   => 'success',
                    'message' => 'Gambar berhasil di-upload',
                    'file'  => $this->upload->data('file_name')

                ];
                $upload = $this->upload->data();
                $this->upload_config->config($folder, $upload);

                $site = [
                    'icon'        => $upload['file_name']
                ];
                $this->db->where('id', 1);
                $this->db->update('site', $site);
            }
            echo json_encode($data);
        }
    }

    public function logo()
    {
        if ($this->input->is_ajax_request()) {

            $site = $this->site_model->listing();
            $oldfile = $site->logo;
            $folder = 'config';
            $this->upload_config->hapus_file($folder, $oldfile);


            $config['upload_path'] = './assets/img/upload/'.$folder.'/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']  = '4000';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('logo')) {
                $data = [
                    'respond'   => 'error',
                    'message' => $this->upload->display_errors()
                ];
            } else {
                $data = [
                    'upload_data' => $this->upload->data(),
                    'respond'   => 'success',
                    'message' => 'Gambar berhasil di-upload',
                    'file'  => $this->upload->data('file_name')

                ];
                $upload = $this->upload->data();
                $this->upload_config->config($folder, $upload);

                $site = [
                    'logo'        => $upload['file_name']
                ];
                $this->db->where('id', 1);
                $this->db->update('site', $site);
            }
            echo json_encode($data);
        }
    }


    public function logoclient($id)
    {
        if ($this->input->is_ajax_request()) {

            $client = $this->client_model->get($id);
            $oldfile = $client->logo;
            $folder = 'client';
            $this->upload_config->hapus_file($folder, $oldfile);


            $config['upload_path'] = './assets/img/upload/'.$folder.'/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']  = '4000';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('logoclient')) {
                $data = [
                    'respond'   => 'error',
                    'message' => $this->upload->display_errors()
                ];
            } else {
                $data = [
                    'upload_data' => $this->upload->data(),
                    'respond'   => 'success',
                    'message' => 'Gambar berhasil di-upload',

                ];
                $upload = $this->upload->data();
                $this->upload_config->config($folder, $upload);

                $client = [
                    'logo'        => $upload['file_name']
                ];
                $this->db->where('id', $id);
                $this->db->update('client', $client);
            }
            echo json_encode($data);
        }
    }

    public function gambarclient($id)
    {
        if ($this->input->is_ajax_request()) {

            $client = $this->client_model->get($id);
            $folder = 'client';


            $config['upload_path'] = './assets/img/upload/'.$folder.'/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']  = '4000';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambarclient')) {
                $data = [
                    'respond'   => 'error',
                    'message' => $this->upload->display_errors()
                ];
            } else {
                $data = [
                    'upload_data' => $this->upload->data(),
                    'respond'   => 'success',
                    'message' => 'Gambar berhasil di-upload'

                ];
                $upload = $this->upload->data();
                $this->upload_config->config($folder, $upload);

                $gambar = [
                    'id_client' => $id,
                    'file'        => $upload['file_name'],
                ];
                $this->db->insert('gambar', $gambar);
            }
            echo json_encode($data);
        }
    }
}

/* End of file upload.php */
