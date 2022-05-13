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
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('keranjang');
        $this->load->view('templates/footer');
    }

    public function hapus_keranjang()
    {
        $this->cart->destroy();
        redirect('welcome');
    }

    public function pembayaran()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pembayaran');
        $this->load->view('templates/footer');
    }

    public function proses_pesanan()
    {
        date_default_timezone_set('Asia/Jakarta');
        $id_user = $this->session->userdata('id');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $no_hape = $this->input->post('no_telp');
        // $metodebayar = $this->input->post('metode_pembayaran');
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

        // tripay
        // $apiKey       = 'DEV-m7hwgfuuDkuUYQ6oQRAPE5h7FyAVYPFy87m4DERv';
        // $privateKey   = 'QldGG-ryeUM-aR6kS-Klls0-gi1q3';
        // $merchantCode = 'T10724';
        // $merchantRef  = $no_invoice;
        // $amount       = preg_replace('/\D/', '', $this->cart->total());
        // foreach ($this->cart->contents() as $item) {
        //     $keranjang[] = [
        //         'sku' => $item['id'],
        //         'name' => $item['name'],
        //         'quantity' => $item['qty'],
        //         'price' => $item['price'],
        //     ];
        // }
        // $datatripay = [
        //     'method'         => $metodebayar,
        //     'merchant_ref'   => $merchantRef,
        //     'amount'         => $amount,
        //     'customer_name'  => $nama,
        //     'customer_email' => 'emailpelanggan@domain.com',
        //     'customer_phone' => $no_hape,
        //     'order_items'    => $keranjang,
        //     'return_url'   => $returnurl,
        //     'expired_time' => (time() + (24 * 60 * 60)), // 24 jam
        //     'signature'    => hash_hmac('sha256', $merchantCode . $merchantRef . $amount, $privateKey)
        // ];

        // $curl = curl_init();

        // curl_setopt_array($curl, [
        //     CURLOPT_FRESH_CONNECT  => true,
        //     CURLOPT_URL            => 'https://tripay.co.id/api-sandbox/transaction/create',
        //     CURLOPT_RETURNTRANSFER => true,
        //     CURLOPT_HEADER         => false,
        //     CURLOPT_HTTPHEADER     => ['Authorization: Bearer ' . $apiKey],
        //     CURLOPT_FAILONERROR    => false,
        //     CURLOPT_POST           => true,
        //     CURLOPT_POSTFIELDS     => http_build_query($datatripay)
        // ]);

        // $response = curl_exec($curl);
        // $error = curl_error($curl);

        // curl_close($curl);
        // $url_checkout = $respon->data->checkout_url;
        // $respon = json_decode($response);
        // $saveData = [
        //     'id_user' => $id_user,
        //     'reference' => $respon->data->reference,
        //     'status' => $respon->data->status,
        //     'merchant_ref' => $respon->data->merchant_ref,
        //     'payment_method' => $respon->data->payment_method,
        //     'payment_name' => $respon->data->payment_name,
        //     'customer_name' => $respon->data->customer_name,
        //     'customer_email' => $respon->data->customer_email,
        //     'customer_phone' => $respon->data->customer_phone,
        //     'amount' => $respon->data->amount,
        //     'fee_merchant' => $respon->data->fee_merchant,
        //     'fee_customer' => $respon->data->fee_customer,
        //     'amount_received' => $respon->data->amount_received,
        //     'pay_code' => $respon->data->pay_code,
        //     'checkout_url' => $respon->data->checkout_url,
        //     'expired_time' => $respon->data->expired_time,
        //     'qr_string' => $respon->data->qr_string,
        //     'qr_url' => $respon->data->qr_url,
        // ];

        // $this->Model_invoice->simpanData($saveData);
        $this->cart->destroy();
        redirect('dashboard/bayaran');
    }
    public function history()
    {
        $data['invoice'] = $this->Model_invoice->history();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('history', $data);
        $this->load->view('templates/footer');
    }
    public function detail_history()
    {
        $idinv = $this->uri->segment(3);
        $data['detail'] = $this->Model_invoice->detail_history($idinv);
        $data['detailproduk'] = $this->Model_invoice->detail_produk($idinv);

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('history_barang', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id_brg)
    {
        $data['barang'] = $this->Model_barang->detail_brg($id_brg);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('detail_barang', $data);
        $this->load->view('templates/footer');
    }
    public function search()
    {
        $keyword = $this->input->post('keyword');
        $data['barang'] = $this->Model_barang->search($keyword);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('search', $data);
        $this->load->view('templates/footer');
    }

    public function bayaran()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('proses_pesanan');
        $this->load->view('templates/footer');
    }
}
