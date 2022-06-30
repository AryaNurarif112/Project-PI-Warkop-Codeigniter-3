<?php
class Model_invoice extends CI_Model
{
    public function index($invoice)
    {
        $this->db->insert('tb_invoice', $invoice);
        $id_invoice = $this->db->insert_id();

        foreach ($this->cart->contents() as $item) {
            $data = array(
                'id_invoice' => $id_invoice,
                'id_brg' => $item['id'],
                'nama_brg' => $item['name'],
                'jumlah' => $item['qty'],
                'harga' => $item['price'],
            );
            $this->db->insert('tb_pesanan', $data);
        }
        return TRUE;
    }

    public function tampil_data()
    {
        $query = $this->db->get('tb_invoice');
        return $query->result();
    }

    public function ambil_id_invoice($id_invoice)
    {
        $result = $this->db->where('id', $id_invoice)->limit(1)->get('tb_invoice');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return false;
        }
    }
    public function ambil_id_pesanan($id_invoice)
    {
        $result = $this->db->where('id_invoice', $id_invoice)->get('tb_pesanan');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }
    public function simpanData($saveData)
    {
        $this->db->insert('tb_tripay', $saveData);
    }

    public function history()
    {
        $this->db->select('*, COUNT(tb_pesanan.id) AS totalpesanan, tb_invoice.id AS idinvoice');
        $this->db->from('tb_invoice');
        $this->db->join('tb_tripay', 'tb_tripay.merchant_ref = tb_invoice.no_invoice', 'left');
        $this->db->join('tb_pesanan', 'tb_pesanan.id_invoice = tb_invoice.id', 'left');
        $this->db->where('tb_invoice.id_user', $this->session->userdata('id'));
        $this->db->group_by('tb_invoice.id');
        $query = $this->db->get();
        return $query->result();
    }
    public function detail_history($idinv)
    {
        $this->db->select('*');
        $this->db->from('tb_invoice');
        $this->db->join('tb_tripay', 'tb_tripay.merchant_ref = tb_invoice.no_invoice', 'left');
        $this->db->where('tb_invoice.id', $idinv);
        $query = $this->db->get();
        return $query->result();
    }
    public function detail_produk($idinv)
    {
        $this->db->select('*');
        $this->db->from('tb_pesanan');
        $this->db->where('tb_pesanan.id_invoice', $idinv);
        $query = $this->db->get();
        return $query->result();
    }

    //untuk mendelete invoice
    public function hapus_invoice($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    //untuk mendelete user
    public function hapus_user($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    //untuk merubah status sudah dibayar atau belum
    public function setpaid($idinv)
    {
        $this->db->set('is_paid', '1');
        $this->db->where('id', $idinv);
        $this->db->update('tb_invoice');
    }
    public function setunpaid($idinv)
    {
        $this->db->set('is_paid', '0');
        $this->db->where('id', $idinv);
        $this->db->update('tb_invoice');
    }

    public function rolepaid($roleid)
    {
        $this->db->set('role_id', '1');
        $this->db->where('id', $roleid);
        $this->db->update('tb_user');
    }
    public function roleunpaid($roleid)
    {
        $this->db->set('role_id', '2');
        $this->db->where('id', $roleid);
        $this->db->update('tb_user');
    }
}
