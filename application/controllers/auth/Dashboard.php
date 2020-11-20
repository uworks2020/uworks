<?php


defined('BASEPATH') or exit('No direct script access allowed');

class dashboard extends CI_Controller
{


	
	public function __construct()
	{
		parent::__construct();
		
		if(!$this->session->has_userdata('email')){
			redirect(base_url('auth/login'));
		}
	}
	
    public function index()
	{
        $site = $this->site_model->listing();
		$data = [
			'title'	=> 'Dashboard',
			'content'	=> 'auth/dashboard/list'


		];
		$this->load->view('auth/template/list', $data, FALSE);
		
	}
}

/* End of file dashboard.php */
