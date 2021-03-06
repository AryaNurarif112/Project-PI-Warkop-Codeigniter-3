<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function index()
	{
		$data['title'] = 'Enjoy Your Shopping';
		$this->load->model('Model_barang');
		$data['barang'] = $this->Model_barang->tampil_data()->result_array();
		$data['user'] = $this->db->get_where('tb_user', ['id' => $this->session->userdata('id')])->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('dashboard', $data);
		$this->load->view('templates/footer', $data);
	}
}
