<?php



	class User_model extends CI_Model{


        public function register($enc_password)
        {
            // User data array
            $data = array(
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => $enc_password

            );

            // Insert user
            return $this->db->insert('users', $data);
        }
    }