<?php
defined('BASEPATH') OR exit('Forbidden');


class Users extends CI_Controller{

    public function index($page = 'userhome'){
        if ( file_exists(APPPATH.'views/users/'.$page.'.php'))
        {
            $data['title'] = ucfirst($page); // Capitalize the first letter

            $this->load->view('templates/header', $data);
            $this->load->view('users/'.$page);
            $this->load->view('templates/footer');

        } else {
            // Whoops, we don't have a page for that!
            /* show_404();*/
            $data['title'] = ucfirst($page); // Capitalize the first letter

            $this->load->view('templates/header', $data);
            $this->load->view('users/custom404');
            $this->load->view('templates/footer');
        }
    }


    //TODO: Re-write this function using custom script instead of the form_validation library
    public function signin(){
        $data['title'] = 'Sign In';

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if($this->form_validation->run() === FALSE){
            $this->load->view('templates/header', $data);
            $this->load->view('users/signin', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->load->model('user_model');
            // Get username
            $username = $this->input->post('username');
            // Get and encrypt the password
            $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

            // Login user
            $user_id = $this->user_model->signin($username, $password);

            if($user_id){
                // Create session
                $user_data = array(
                    'user_id' => $user_id,
                    'username' => $username,
                    'logged_in' => true
                );

                $this->session->set_userdata($user_data);

                // Set message
                $this->session->set_flashdata('user_loggedin', 'You are now logged in');

                redirect('users/register');
            } else {
                // Set message
                $this->session->set_flashdata('login_failed', 'Login is invalid');

                redirect('users/register');
            }
        }
    }

    public function validateForm(){
        return false;


    }
}