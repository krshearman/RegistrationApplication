<?php


class Users extends CI_Controller{

    public function register(){

        $data['title'] = 'Sign Up';

        /*$this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('emailconf', 'Confirm Email', 'matches[email]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
        $this->form_validation->set_rules('passwordconf', 'Confirm Password', 'matches[password]');*/


        if (empty($_POST)) {
            $this->load->view('templates/header', $data);
            $this->load->view('users/register', $data);
            $this->load->view('templates/footer', $data);
        } else {

            if (!empty($_POST)) {

                $username = substr(strip_tags(trim($_POST['username'])), 0, 64);
                $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ? $_POST['email'] : "";
                $password = substr(strip_tags(trim($_POST['password'])), 0, 64);

                if (!empty($username) && !empty($email) && !empty($password)) {
                    //Load Model
                    $this->load->model('user_model');

                    // Encrypt password
                    $enc_password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

                    $this->user_model->register($enc_password);

                    // Set message
                    //$this->session->set_flashdata('user_registered', 'You are now registered and can log in');


                    //Eventually redirect this to signin

                    redirect('users/register');

                    //die('Continue');
                }
            }
        }
    }


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