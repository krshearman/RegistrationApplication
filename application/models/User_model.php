<?php



	class User_model extends CI_Model{


        public function register($enc_password){
            // User data array
            $data = array(
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => $enc_password

            );

            // Insert user
            $this->db->insert('users', $data);
        }

        public function signin($username, $password){
            // Validate
            $this->db->where('username', $username);
            $this->db->where('password', $password);

            $result = $this->db->get('users');

            if (!empty($result) && password_verify('password', $password)) {
                // if this username exists, and the input password is verified using password_verify
                return $result;
            } else {
                return false;
            }
        }
    }