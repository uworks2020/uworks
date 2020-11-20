<?php


defined('BASEPATH') or exit('No direct script access allowed');

class team extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();

		if (!$this->session->has_userdata('email')) {
			redirect(base_url('auth/login'));
		}
		$this->load->library('form_validation');
	}

	public function index()
	{

		$data = [
			'title'	=> 'Team',
			'content'	=> 'auth/team/list'


		];
		$this->load->view('auth/template/list', $data, FALSE);
	}

	public function tabel_team()
	{
		$team = $this->team_model->listing();
		$data = [
			'team'	=> $team
		];
		$this->load->view('auth/team/tabel', $data, FALSE);
	}

	public function h_tambah()
	{
		$team = $this->team_model->listing();
		$data = [
			'title'	=> 'Tambah Team',
			'content'	=> 'auth/team/tambah',
			'team'	=> $team
		];
		$this->load->view('auth/template/modal', $data, FALSE);
	}

	public function p_tambah()
	{
		
		if ($this->input->is_ajax_request()) {

			$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
			$this->form_validation->set_rules('tugas', 'Tugas', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[team.email]', [
				'is_unique'	=> '%s sudah digunakan',
				'valid_email'	=> '%s tidak valid'
			]);
			$this->form_validation->set_rules('telp', 'Nomor Telepon', 'trim|required');
			$this->form_validation->set_rules('ig', 'Instagram', 'trim|required');
			$this->form_validation->set_rules('wa', 'Whatsapp', 'trim|required');


			if ($this->form_validation->run() == FALSE) {
				$data = [
					'respond'	=> 'validasi_error',
					'message'	=> 'Lengkapi form!'
				];
			} else {

				$post = $this->input->post();
				$proses = $this->team_model->tambah($post);

				if ($proses) {
					$data = [
						'respond'	=> 'success',
						'message'	=> 'Berhasil tambah data team!'
					];
				} else {
					$data = [
						'respond'	=> 'error',
						'message'	=> 'Gagal tambah data team!'
					];
				}
			}

			echo json_encode($data);
		}
	}

	public function hapus($id)
	{
		if ($this->input->is_ajax_request()) {




			$detailteam = $this->team_model->get($id);
			if ($detailteam->gambar != 'default.png') {

				$file1 = 'assets/img/upload/team/' . $detailteam->gambar;
				$file2 = 'assets/img/upload/team/thumbs/' . $detailteam->gambar;
				$file3 = 'assets/img/upload/team/thumbs/cropped/' . $detailteam->gambar;
				$file4 = 'assets/img/upload/team/cropped/' . $detailteam->gambar;

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

			$proses = $this->team_model->hapus($id);

			if ($proses) {
				$data = [
					'respond'	=> 'success',
					'message'	=> 'Berhasil hapus data team!'
				];
			} else {
				$data = [
					'respond'	=> 'error',
					'message'	=> 'Gagal hapus data team!'
				];
			}


			echo json_encode($data);
		}
	}

	public function h_edit($id)
	{

		$team = $this->team_model->get($id);
		$data = [
			'title'	=> 'Edit Data ' . $team->nama,
			'team'	=> $team,
			'content'	=> 'auth/team/edit'
		];
		$this->load->view('auth/template/modal', $data, FALSE);
	}

	public function p_edit()
	{
		if ($this->input->is_ajax_request()) {
			$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
			$this->form_validation->set_rules('tugas', 'Tugas', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|required');
			$this->form_validation->set_rules('telp', 'Nomor Telepon', 'trim|required');
			$this->form_validation->set_rules('ig', 'Instagram', 'trim|required');
			$this->form_validation->set_rules('wa', 'Whatsapp', 'trim|required');


			if ($this->form_validation->run() == FALSE) {
				$data = [
					'respond'	=> 'validasi_error',
					'message'	=> 'Lengkapi Form!'
				];
			} else {

				$post = $this->input->post();
				$proses = $this->team_model->edit($post);
				if ($proses) {
					$data = [
						'respond'	=> 'success',
						'message'	=> 'Berhasil edit data team'
					];
				} else {
					$data = [
						'respond'	=> 'error',
						'message'	=> 'Gagal edit data team'
					];
				}
			}

			echo json_encode($data);
		}
	}

	public function h_gambar($id)
	{

		$team = $this->team_model->get($id);
		$data = [
			'title'	=> 'Edit Foto ' . $team->nama,
			'team'	=> $team,
			'content'	=> 'auth/team/gambar'
		];
		$this->load->view('auth/template/modal', $data, FALSE);
	}
}

/* End of file team.php */
