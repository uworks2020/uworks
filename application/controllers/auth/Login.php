<?php


defined('BASEPATH') or exit('No direct script access allowed');

class login extends CI_Controller
{

    
    public function __construct()
    {
        parent::__construct();
       
    }
    
    public function index()
    {
        if($this->session->has_userdata('email')){
            redirect(base_url('auth/dashboard'));
        }
        $data = [
            'title' => 'Login Administrator'
        ];
        $this->load->view('auth/login/list', $data, FALSE);
    }

    public function proses()
    {
        if ($this->input->is_ajax_request()) {
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');


            if ($this->form_validation->run() == FALSE) {
                $data = [
                    'respond' => 'validasi_error',
                    'message' => 'Lengkapi form!'
                ];
            } else {

                $email = $this->input->post('email');
                $password = MD5($this->input->post('password'));

                $proses = $this->db->get_where('team', [
                    'email' => $email
                ])->row();

                if ($proses) {

                    $dataadmin = $this->db->get_where('admin', [
                        'team_id' => $proses->id
                    ])->row();
                    if ($dataadmin->password == $password) {

                        if ($dataadmin->active == 1) {
                            $data = [
                                'respond'   => 'success',
                                'message'   => 'Anda berhasil login!'
                            ];


                            $array = array(
                                'email' => $email,
                                'role'  => $dataadmin->role,
                                'nama'  => $proses->nama
                            );

                            $this->session->set_userdata($array);
                        } else {
                            $data = [
                                'respond'   => 'error',
                                'message'   => 'User tidak aktif'
                            ];
                        }
                    } else {
                        $data = [
                            'respond'   => 'error',
                            'message'   => 'Password salah'
                        ];
                    }
                } else {
                    $data = [
                        'respond'   => 'error',
                        'message'   => 'User tidak ditemukan!'
                    ];
                }
            }

            echo json_encode($data);
        }
    }

    public function logout()
    {
        if ($this->input->is_ajax_request()) {

            $this->session->sess_destroy();

            $data = [
                'respond'   => 'success',
                'message'   => 'Anda berhasil logout!'
            ];

            echo json_encode($data);
        }
    }
}

/* End of file login.php */
