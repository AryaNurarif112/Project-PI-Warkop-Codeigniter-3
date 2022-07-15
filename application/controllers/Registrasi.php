<?php

class Registrasi extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Halaman Registrasi';
        $this->form_validation->set_rules('nama', 'Nama', 'required|max_length[25]', ['required' => 'Nama wajib diisi!', 'max_length' => 'Nama Maksimal 25 kata']);
        $this->form_validation->set_rules('username', 'Username', 'required|max_length[25]', ['required' => 'Username wajib diisi!', 'max_length' => 'Username Maksimal 25 kata']);
        $this->form_validation->set_rules('password_1', 'Password', 'required|min_length[3]|matches[password_2]', ['required' => 'Password wajib Diisi', 'matches' => 'Password tidak cocok', 'min_length' => 'Password terlalu pendek']);
        $this->form_validation->set_rules('password_2', 'Password', 'required|matches[password_1]');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('registrasi', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data = array(
                'id' => '',
                'nama' => $this->input->post('nama'),
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password_1')),
                'role_id' => 2,
                'date_created' => time(),
            );
            $this->db->insert('tb_user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Selamat! Anda berhasil mendaftar. Silahkan Login </div>');
            redirect('auth/login');
        }
    }
}
