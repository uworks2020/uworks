<?php
defined('BASEPATH') or exit('No direct script access allowed');

class home extends CI_Controller
{




	public function index()
	{
		$config = $this->site_model->listing();
		$team = $this->team_model->listing();
		$services = $this->services_model->listing();
		$content = $this->content_model->listing();
		$testimoni = $this->testimoni_model->listing();
		$client = $this->client_model->listing();

		$data = [
			'title'	=> $config->namaweb,
			'content'	=> $content,
			'services'	=> $services,
			'testimoni'	=> $testimoni,
			'client'	=> $client,
			'team'	=> $team,
			'isi'	=> 'front/index'
		];
		$this->load->view('front/layout', $data, FALSE);
	}
}
