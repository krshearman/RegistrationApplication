<?php
defined('BASEPATH') OR exit('Forbidden');

class Secure_Ajax extends MY_Controller {
    public function resetPass(){
        $response = 'error';
        if(!empty($_POST)){
            $email = filter_var($_POST['resetemail'], FILTER_VALIDATE_EMAIL) ? $_POST['resetemail'] : "";
            $password = substr(strip_tags(trim($_POST['password'])), 0, 64);
            //$response = 'okay';
            if($email !== "" && $password !== ""){
                $this->load->model('user_model');
                $enc_password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
                if(($this->user_model->changePass($email, $enc_password))){
                    $response = 'okay';
                }


            }

        }
        echo $response;
    }

    public function createUserSession(){

    }


}