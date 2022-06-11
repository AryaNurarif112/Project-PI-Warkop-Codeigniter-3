<?php

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role_id') != '2') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Anda Belum Login!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('auth/login');
        }
    }

    public function my_profile()
    {
        $this->load->model('Model_barang');
        $data['title'] = 'Profile User';
        $data['user'] = $this->db->get_where('tb_user', ['id' =>
        $this->session->userdata('id')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('my_profile', $data);
        $this->load->view('templates/footer', $data);
    }

    public function edit_profile()
    {
        if ($this->form_validation->run() == false) {
            $this->load->model('Model_barang');
            $data['title'] = 'Edit Profile User';
            $data['user'] = $this->db->get_where('tb_user', ['id' => $this->session->userdata('id')])->row_array();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('edit_profile', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $nama = $this->input->post('nama');
            $username = $this->input->post('username');

            $this->db->set('nama', $nama);
            $this->db->set('username', $username);
            $this->db->update('tb_user');
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert"></div>');
            redirect('tb_user');
        }
    }

    public function edit_password()
    {
        $this->load->model('Model_barang');
        $data['title'] = 'Edit Password User';
        $data['user'] = $this->Model_barang->edit_password()->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('edit_password', $data);
        $this->load->view('templates/footer', $data);
    }

    public function tambah_ke_keranjang($id)
    {
        $barang = $this->Model_barang->find($id);
        $data = array(
            'id'      => $barang->id_brg,
            'qty'     => 1,
            'price'   => $barang->harga,
            'name'    => $barang->nama_brg,
        );

        $this->cart->insert($data);
        redirect('welcome');
    }

    public function detail_keranjang()
    {
        $data['title'] = 'Detail Keranjang';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('keranjang', $data);
        $this->load->view('templates/footer', $data);
    }

    public function hapus_keranjang()
    {
        $this->cart->destroy();
        redirect('welcome');
    }

    public function pembayaran()
    {
        $data['title'] = 'Pembayaran';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pembayaran', $data);
        $this->load->view('templates/footer', $data);
    }

    public function proses_pesanan()
    {
        date_default_timezone_set('Asia/Jakarta');
        $id_user = $this->session->userdata('id');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $no_hape = $this->input->post('no_telp');
        $no_invoice = date('YmdHis');
        $returnurl = base_url();
        $invoice = array(
            'id_user' => $id_user,
            'no_invoice' => $no_invoice,
            'nama' => $nama,
            'alamat' => $alamat,
            'no_hape' => $no_hape,
            'tgl_pesan' => date('Y-m-d H:i:s'),
            'batas_bayar' => date('Y-m-d H:i:s', mktime(
                date('H'),
                date('i'),
                date('s'),
                date('m'),
                date('d') + 1,
                date('Y')
            )),
            'is_paid' => false,
        );
        $this->Model_invoice->index($invoice); //save invoice

        $this->cart->destroy();
        redirect('dashboard/bayaran');
    }
    public function history()
    {
        $data['title'] = 'History';
        $data['invoice'] = $this->Model_invoice->history();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('history', $data);
        $this->load->view('templates/footer', $data);
    }
    public function detail_history()
    {
        $idinv = $this->uri->segment(3);
        $data['title'] = 'Detail History';
        $data['detail'] = $this->Model_invoice->detail_history($idinv);
        $data['detailproduk'] = $this->Model_invoice->detail_produk($idinv);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('history_barang', $data);
        $this->load->view('templates/footer', $data);
    }

    public function detail($id_brg)
    {
        $data['title'] = 'Detail Barang';
        $data['barang'] = $this->Model_barang->detail_brg($id_brg);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('detail_barang', $data);
        $this->load->view('templates/footer', $data);
    }
    public function search()
    {
        $data['title'] = 'Search';
        $keyword = $this->input->post('keyword');
        $data['barang'] = $this->Model_barang->search($keyword);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('search', $data);
        $this->load->view('templates/footer', $data);
    }

    public function bayaran()
    {
        $data['title'] = 'Bayaran';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('proses_pesanan', $data);
        $this->load->view('templates/footer', $data);
    }
}
