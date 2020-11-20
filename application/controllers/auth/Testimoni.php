<?php


defined('BASEPATH') or exit('No direct script access allowed');

class testimoni extends CI_Controller
{

	public function index()
	{
		$data = [
			'title'	=> 'Testimoni',
			'content'	=> 'auth/testimoni/list'


		];
		$this->load->view('auth/template/list', $data, FALSE);
	}

	public function tabel()
	{
		$testimoni = $this->testimoni_model->listing();
		$data = [
			'testimoni'	=> $testimoni

		];
		$this->load->view('auth/testimoni/tabel', $data, FALSE);
	}

	public function h_tambah()
	{
		$client = $this->client_model->listing();
		$data = [
			'title'	=> 'Tambah Testimoni',
			'content'	=> 'auth/testimoni/tambah',
			'client'	=> $client
		];
		$this->load->view('auth/template/modal', $data, FALSE);
	}

	public function p_tambah()
	{
		if ($this->input->is_ajax_request()) {
			$this->form_validation->set_rules('id_client', 'Client', 'trim|required');
			$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
			$this->form_validation->set_rules('isi', 'Isi', 'trim|required');


			if ($this->form_validation->run() == FALSE) {
				$data = [
					'respond'	=> 'error',
					'message'	=> validation_errors()
				];
			} else {
				$post = $this->input->post();
				$proses = $this->testimoni_model->tambah($post);

				if ($proses) {
					$data = [
						'respond'	=> 'success',
						'message'	=> 'Berhasil tambah data testimoni!'
					];
				} else {
					$data = [
						'respond'	=> 'error',
						'message'	=> 'Gagal tambah data testimoni!'
					];
				}
			}

			echo json_encode($data);
		}
	}

	public function hapus($id)
	{
		if ($this->input->is_ajax_request()) {
			$testimoni = $this->testimoni_model->get($id);
			$file = $testimoni->foto;
			$folder = 'testimoni';
			$this->upload_config->hapus_file($folder, $file);


			$proses = $this->testimoni_model->hapus($id);
			if ($proses) {
				$data = [
					'respond'	=> 'success',
					'message'	=> 'Berhasil hapus data testimoni!'
				];
			} else {
				$data = [
					'respond'	=> 'error',
					'message'	=> 'Gagal hapus data testimoni!'
				];
			}

			echo json_encode($data);
		}
	}

	public function h_edit($id)
	{
		$client = $this->client_model->listing();
		$testimoni = $this->testimoni_model->get($id);
		$data = [
			'title'	=> 'Edit Testimoni '.$testimoni->nama,
			'content'	=> 'auth/testimoni/edit',
			'client'	=> $client,
			'testimoni'	=> $testimoni
		];
		$this->load->view('auth/template/modal', $data, FALSE);
	}

	public function foto($id)
	{
		$testimoni = $this->testimoni_model->get($id);
		$data = [
			'title'	=> 'Edit foto '.$testimoni->nama,
			'content'	=> 'auth/testimoni/foto',
			'testimoni'	=> $testimoni
		];
		$this->load->view('auth/template/modal', $data, FALSE);
		
	}

	public function p_edit($id)
	{
		if($this->input->is_ajax_request())
		{
			$post = $this->input->post();
			$proses = $this->testimoni_model->edit($id,$post);
			if ($proses) {
				$data = [
					'respond'	=> 'success',
					'message'	=> 'Berhasil memperbarui data testimoni!'
				];
			} else {
				$data = [
					'respond'	=> 'error',
					'message'	=> 'Gagal memperbarui data testimoni!'
				];
			}
			echo json_encode($data);
		}
	}
}

/* End of file testimoni.php */
