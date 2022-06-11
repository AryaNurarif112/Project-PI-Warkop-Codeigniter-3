<?php
// kalau cuma satu kan query nya nanti pake row_array(), kalau lebih pake result_array(), kalau datanya lebih dari satu, pake foreach berarti
class Model_barang extends CI_model
{
    public function tampil_data()
    {
        return $this->db->get('tb_barang');
    }

    public function tampil_user()
    {
        return $this->db->get('tb_user');
    }

    public function my_profile()
    {
        return $this->db->where('tb_user');
    }

    public function edit_profile()
    {
        return $this->db->get('tb_user');
    }

    public function edit_password()
    {
        return $this->db->get('tb_user');
    }

    public function tambah_barang($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function edit_barang($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function find($id)
    {
        $result = $this->db->where('id_brg', $id)
            ->limit(1)
            ->get('tb_barang');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return array();
        }
    }

    public function search($keyword)
    {
        $result = $this->db->where('nama_brg', $keyword)->get('tb_barang');
        if ($result->num_rows() > 0) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    public function detail_brg($id_brg)
    {
        $result = $this->db->where('id_brg', $id_brg)->get('tb_barang');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }
}
