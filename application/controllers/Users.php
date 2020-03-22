<?php


class Users extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function register()
    {


        $data['title'] = 'Sign Up';

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('emailconf', 'Confirm Email', 'matches[email]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('passwordconf', 'Confirm Password', 'matches[password]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('users/register', $data);
            $this->load->view('templates/footer', $data);
        } else {
            // Encrypt password
            /*$enc_password = md5($this->input->post('password'));

            $this->user_model->register($enc_password);

            // Set message
            $this->session->set_flashdata('user_registered', 'You are now registered and can log in');*/

            redirect('pages');
        }
    }
}