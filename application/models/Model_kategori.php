<?php

class Model_kategori extends CI_Model
{
    public function data_makanan_utama()
    {
        return $this->db->get_where("tb_barang", array('kategori' => 'Makanan Utama'));
    }
    public function data_makanan_padat()
    {
        return $this->db->get_where("tb_barang", array('kategori' => 'Makanan Padat'));
    }
    public function data_minuman()
    {
        return $this->db->get_where("tb_barang", array('kategori' => 'Minuman'));
    }
    public function data_cemilan()
    {
        return $this->db->get_where("tb_barang", array('kategori' => 'Cemilan'));
    }
    public function data_indomie()
    {
        return $this->db->get_where("tb_barang", array('kategori' => 'Indomie'));
    }
    public function data_corndog()
    {
        return $this->db->get_where("tb_barang", array('kategori' => 'Corndog'));
    }
}
