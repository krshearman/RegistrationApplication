<?php



	class User_model extends CI_Model{


        public function register($username, $email, $enc_password){
            // User data array
            $data = array(
                'username' => $username,
                'email' => $email,
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

        // Check username exists
        public function check_username_exists($username){
            $query = $this->db->get_where('users', array('username' => $username));
            if(empty($query->row_array())){
                return true;
            } else {
                return false;
            }
        }

        // Check email exists
        public function check_email_exists($email){
            $query = $this->db->get_where('users', array('email' => $email));
            if(empty($query->row_array())){
                return true;
            } else {
                return false;
            }
        }

        public function encrypted_code($email) {
             $cost = 10;
             //random_bytes requires PHP 7.x and higher
             $salt = strtr(base64_encode(random_bytes(16)), '+', '.');
             $salt = sprintf("$2a$%02d$", $cost) . $salt;
             $code = substr(crypt(strtolower($email), $salt), 7) . uniqid();
             return preg_replace("/[^A-Za-z0-9 ]/", '', $code);
             }

        public function log_pwdreset($email, $enc_code, $expiry_time){
           $query = $this->db->get_where('users', array('email' => $email));
           $id = $query->row(0)->id;

           $data = array(
                'id' => $id,
                'email' => $email,
                'token' => $enc_code,
                'expiry_time' => $expiry_time
            );

            $this->db->insert('pwdreset', $data);

        }
    }