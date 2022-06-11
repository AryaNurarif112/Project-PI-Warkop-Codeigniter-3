<?php

class Kategori extends CI_Controller
{
    public function makanan_utama()
    {
        $data['title'] = 'Makanan Utama';
        $data['makanan_utama'] = $this->Model_kategori->data_makanan_utama()->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('makanan_utama', $data);
        $this->load->view('templates/footer', $data);
    }
    public function makanan_padat()
    {
        $data['title'] = 'Makanan Padat';
        $data['makanan_padat'] = $this->Model_kategori->data_makanan_padat()->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('makanan_padat', $data);
        $this->load->view('templates/footer', $data);
    }
    public function minuman()
    {
        $data['title'] = 'Minuman';
        $data['minuman'] = $this->Model_kategori->data_minuman()->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('minuman', $data);
        $this->load->view('templates/footer', $data);
    }
    public function cemilan()
    {
        $data['title'] = 'Makanan Cemilan';
        $data['cemilan'] = $this->Model_kategori->data_cemilan()->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('cemilan', $data);
        $this->load->view('templates/footer', $data);
    }
    public function indomie()
    {
        $data['title'] = 'Indomie';
        $data['indomie'] = $this->Model_kategori->data_indomie()->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('indomie', $data);
        $this->load->view('templates/footer', $data);
    }
    public function corndog()
    {
        $data['title'] = 'Corndog';
        $data['corndog'] = $this->Model_kategori->data_corndog()->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('corndog', $data);
        $this->load->view('templates/footer', $data);
    }
}
