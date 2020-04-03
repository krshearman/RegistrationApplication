<?php


class Users extends CI_Controller{

    public function register(){
        $response = 'error';
        $data['title'] = 'Sign Up';

        if (empty($_POST)) {
            $this->load->view('templates/header', $data);
            $this->load->view('users/register', $data);
            $this->load->view('templates/footer', $data);
        } else {

            if (!empty($_POST)) {

                $this->load->model('user_model');

                $username = substr(strip_tags(trim($_POST['username'])), 0, 64);
                $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ? $_POST['email'] : "";
                $password = substr(strip_tags(trim($_POST['password'])), 0, 64);

                //incorporate callbacks for check_username_exists() and check_email_exists

                if (!empty($username) && !empty($email) && !empty($password)) {
                    if (($this->user_model->check_username_exists($username)) && ($this->user_model->check_email_exists($email))) {
                        //Load Model
                        $this->load->model('user_model');

                        // Encrypt password
                        $enc_password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

                        $this->user_model->register($username, $email, $enc_password);
                        $response = 'okay';


                        // Set message
                        //$this->session->set_flashdata('user_registered', 'You are now registered and can log in');


                        //Eventually redirect this to signin

                        redirect('users/register');

                        //die('Continue');
                        //echo $response;

                    }
                }
            } echo $response;
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