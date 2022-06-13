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
        $data['user'] = $this->db->get_where('tb_user', ['id' => $this->session->userdata('id')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('my_profile', $data);
        $this->load->view('templates/footer', $data);
    }

    public function edit_profile()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
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
            $this->db->where('id', $this->session->userdata('id'));
            $this->db->update('tb_user');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Berhasil Diubah!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('dashboard/edit_profile');
        }
    }

    public function changePassword()
    {
        $data['title'] = 'Change Password';
        $data['user'] = $this->db->get_where('tb_user', ['id' => $this->session->userdata('id')])->row_array();
        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('edit_password', $data);
            $this->load->view('templates/footer',);
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');

            $cek_password = $this->db->get_where('tb_user', array('id' => $this->session->userdata('id'), 'password' => $current_password));
            // password salah
            if (!$cek_password) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Current Salah!
                </div>' . $current_password);
                redirect('dashboard/edit_password');
            } else { //password tidak boleh sama
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password baru tidak boleh sama!
                </div>');
                    redirect('dashboard/edit_password');
                } else {
                    //password sudah ok
                    $password_hash = $new_password;

                    $this->db->set('password', $password_hash);
                    $this->db->where('id', $this->session->userdata('id'));
                    $this->db->update('tb_user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password changed!
                    </div>');
                    redirect('dashboard/edit_password');
                }
            }
        }
    }

    public function edit_password()
    {
        $this->load->model('Model_barang');
        $data['title'] = 'Edit Password User';
        $data['user'] = $this->Model_barang->edit_password()->result_array();
        $data['user'] = $this->db->get_where('tb_user', ['id' => $this->session->userdata('id')])->row_array();
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
        $data['user'] = $this->db->get_where('tb_user', ['id' => $this->session->userdata('id')])->row_array();
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
        $data['user'] = $this->db->get_where('tb_user', ['id' => $this->session->userdata('id')])->row_array();
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
        $data['user'] = $this->db->get_where('tb_user', ['id' => $this->session->userdata('id')])->row_array();
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
        $data['user'] = $this->db->get_where('tb_user', ['id' => $this->session->userdata('id')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('history_barang', $data);
        $this->load->view('templates/footer', $data);
    }

    public function detail($id_brg)
    {
        $data['title'] = 'Detail Barang';
        $data['barang'] = $this->Model_barang->detail_brg($id_brg);
        $data['user'] = $this->db->get_where('tb_user', ['id' => $this->session->userdata('id')])->row_array();
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
        $data['user'] = $this->db->get_where('tb_user', ['id' => $this->session->userdata('id')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('search', $data);
        $this->load->view('templates/footer', $data);
    }

    public function bayaran()
    {
        $data['title'] = 'Bayaran';
        $data['user'] = $this->db->get_where('tb_user', ['id' => $this->session->userdata('id')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('proses_pesanan', $data);
        $this->load->view('templates/footer', $data);
    }
}
