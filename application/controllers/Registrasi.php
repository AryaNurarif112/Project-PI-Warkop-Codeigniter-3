<?php

class Registrasi extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Halaman Registrasi';
        $this->form_validation->set_rules('nama', 'Nama', 'required', ['required' => 'Nama wajib diisi!']);
        $this->form_validation->set_rules('username', 'Username', 'required', ['required' => 'Username wajib diisi!']);
        $this->form_validation->set_rules('password_1', 'Password', 'required|min_length[3]|matches[password_2]', ['required' => 'Password wajib Diisi', 'matches' => 'Password tidak cocok', 'min_length' => 'Password too short']);
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
                'password' => $this->input->post('password_1'),
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
