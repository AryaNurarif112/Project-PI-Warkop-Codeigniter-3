<?php

class Invoice extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role_id') != '1') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Anda Belum Login!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('auth/login');
        }
    }
    public function index()
    {
        $data['title'] = 'Admin Invoice';
        $data['invoice'] = $this->Model_invoice->tampil_data();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('admin/invoice', $data);
        $this->load->view('templates_admin/footer', $data);
    }

    public function hapus_invoice($id)
    {
        $where = array(
            'id' => $id
        );
        $this->Model_barang->hapus_invoice($where, 'tb_invoice');
        redirect('admin/invoice');
    }
    public function hapus_user($id)
    {
        $where = array(
            'id' => $id
        );
        $this->Model_barang->hapus_user($where, 'tb_user');
        redirect('admin/Data_user');
    }

    public function detail($id_invoice)
    {
        $data['title'] = 'Admin Invoice Detail';
        $data['invoice'] = $this->Model_invoice->ambil_id_invoice($id_invoice);
        $data['pesanan'] = $this->Model_invoice->ambil_id_pesanan($id_invoice);
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('admin/detail_invoice', $data);
        $this->load->view('templates_admin/footer', $data);
    }

    //merubah status pembayaran antara sudah dibayar atau belum
    public function setpaid($id_invoice)
    {
        $this->Model_invoice->setpaid($id_invoice);
        redirect('admin/invoice');
    }

    public function setunpaid($id_invoice)
    {
        $this->Model_invoice->setunpaid($id_invoice);
        redirect('admin/invoice');
    }

    public function rolepaid($tb_user)
    {
        $this->Model_invoice->rolepaid($tb_user);
        redirect('admin/Data_user');
    }

    public function roleunpaid($tb_user)
    {
        $this->Model_invoice->roleunpaid($tb_user);
        redirect('admin/Data_user');
    }
}
