<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class site extends CI_Controller {


public function __construct()
{
    parent::__construct();
}


    public function index()
    {
        $data =[
            'title' => 'Konfigurasi',
            'content'=>'auth/site/list',
            'site'  => $this->site_model->listing()
        ];
        $this->load->view('auth/template/list', $data, FALSE);
        
    }

    public function update_config()
    {
        if($this->input->is_ajax_request())
        {
            $this->form_validation->set_rules('namaweb', 'Nama Website', 'trim|required');
            $this->form_validation->set_rules('tagline', 'Tagline', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required');
            $this->form_validation->set_rules('telp', 'Nomor Telepon', 'trim|required');
            $this->form_validation->set_rules('wa', 'Nomor Whatsapp', 'trim|required');
            $this->form_validation->set_rules('ig', 'Username Instagram', 'trim|required');
            $this->form_validation->set_rules('fb', 'Username Facebook', 'trim|required');
         
            
            if ($this->form_validation->run() == FALSE) {
                $data = [
                    'respond'   => 'error',
                    'message'   => validation_errors()
                ];
            } else {
                
                $post = $this->input->post();
                $proses = $this->site_model->update($post);
                if($proses){
                    $data = [
                        'respond'   => 'success',
                        'message'   => 'Berhasil update data konfigurasi'
                    ];
                }else{
                    $data = [
                        'respond'   => 'error',
                        'message'   => 'Gagal update data konfigurasi'
                    ];
                }
                
            }
            
            
            echo json_encode($data);
        }
    }

    public function icon()
    {
        
    }

}

/* End of file site.php */


?>