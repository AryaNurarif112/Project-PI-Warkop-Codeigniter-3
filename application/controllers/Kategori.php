<?php

class Kategori extends CI_Controller
{
    public function makanan_utama()
    {
        $data['makanan_utama'] = $this->Model_kategori->data_makanan_utama()->result_array();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('makanan_utama', $data);
        $this->load->view('templates/footer');
    }
    public function makanan_padat()
    {
        $data['makanan_padat'] = $this->Model_kategori->data_makanan_padat()->result_array();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('makanan_padat', $data);
        $this->load->view('templates/footer');
    }
    public function minuman()
    {
        $data['minuman'] = $this->Model_kategori->data_minuman()->result_array();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('minuman', $data);
        $this->load->view('templates/footer');
    }
    public function cemilan()
    {
        $data['cemilan'] = $this->Model_kategori->data_cemilan()->result_array();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('cemilan', $data);
        $this->load->view('templates/footer');
    }
    public function indomie()
    {
        $data['indomie'] = $this->Model_kategori->data_indomie()->result_array();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('indomie', $data);
        $this->load->view('templates/footer');
    }
    public function corndog()
    {
        $data['corndog'] = $this->Model_kategori->data_corndog()->result_array();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('corndog', $data);
        $this->load->view('templates/footer');
    }
}
