<?php

class Auth extends CI_Controller
{
    public function login()
    {
        $data['title'] = 'Halaman Login';
        $this->form_validation->set_rules('username', 'Username', 'required', ['required' => 'Username wajib di isi!']);
        $this->form_validation->set_rules('password', 'Password', 'required', ['required' => 'Password wajib di isi!']);
        if ($this->form_validation->run() == FALSE) {

            $this->load->view('templates/header', $data);
            $this->load->view('form_login', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $auth = $this->Model_auth->cek_login();
            if ($auth == FALSE) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Username atau Password Anda Salah!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
              </div>');
                redirect('auth/login');
            } else {
                $this->session->set_userdata('username', $auth->username);
                $this->session->set_userdata('role_id', $auth->role_id);
                $this->session->set_userdata('id', $auth->id);
                switch ($auth->role_id) {
                    case 1:
                        redirect('admin/dashboard_admin');
                        break;
                    case 2:
                        redirect('welcome');
                        break;
                    default:
                        break;
                }
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}
