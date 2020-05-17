<?php
defined('BASEPATH') OR exit('Forbidden');


class Users extends MY_Controller {

    public function resetpass($token){
        $this->load->model('user_model');
        if($this->user_model->check_expiry($token)){
            $data['title'] = 'Reset Password';
            $this->load->view('templates/header', $data);
            $this->load->view('users/resetpass');
            $this->load->view('templates/footer');
        } else if (!($this->user_model->check_expiry($token))){
             $data['title'] = 'Link Expired';
             $this->load->view('templates/header', $data);
             $this->load->view('users/linkexpired');
             $this->load->view('templates/footer');
        }
    }

    public function usersession(){
        if((isset($_SESSION['created']) && isset($_COOKIE['UserCookie'])) /*&& ((isset($_COOKIE['TestCookie']) && $_COOKIE['TestCookie'] == true))*/){
            $data['title'] = 'User Session';
            $this->load->view('templates/header', $data);
            $this->load->view('users/usersession');
            $this->load->view('templates/footer');
        } else {
            $data['title'] = 'Session Expired';
            $this->load->view('templates/header', $data);
            //change this to tell user that session has expired and to login again
            $this->load->view('users/linkexpired');
            $this->load->view('templates/footer');

        }

    }

    public function logout(){
        // Unset user data
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('created');


        // Set message
        //$this->session->set_flashdata('user_loggedout', 'You are now logged out');

        redirect('users');
    }


}