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
            $query = $this->db->get_where('users', array('username' => $username));
            $ver_password = password_verify($password, $query->row(0)->password);

            if (!empty($query) && $ver_password == true) {

                $data = array(
                    'id' => $query->row(0)->id,
                    'username' => $query->row(0)->username,
                    'email' => $query->row(0)->email,
                    'login_time' => time()
                );
                $this->db->insert('usersessions', $data);

                if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                    $ip = $_SERVER['HTTP_CLIENT_IP'];
                } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                } else {
                    $ip = $_SERVER['REMOTE_ADDR'];
                }
                $loginData = array(
                    'last_login_time' => time(),
                    'last_login_ip' => $ip
                );

                $this->db->where('id',  $query->row(0)->id);
                $this->db->update('users', $loginData);

                return $query->row(0)->id;
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
           if(empty($query->row_array())){
                 $data = array(
                    //'id' => null,
                    'email' => $email,
                    'token' => $enc_code,
                    'expiry_time' => $expiry_time
                 );

           } else{
                $id = $query->row(0)->id;

                $data = array(
                'id' => $id,
                'email' => $email,
                'token' => $enc_code,
                'expiry_time' => $expiry_time
                 );
            }
           $this->db->insert('pwdreset', $data);
        }

        public function check_expiry($token){
            $query = $this->db->get_where('pwdreset', array('token' => $token));
            $expiry_time = $query->row(0)->expiry_time;
            $now = time();
            if($expiry_time > $now){
                return true;
            } else {
                return false;
            }
        }

        public function changePass($email, $enc_password){
            $this->db->where('email', $email);
            $this->db->update('users', array('password' => $enc_password));
            return true;
           }



        public function userSessionInfo(){

        }
    }
