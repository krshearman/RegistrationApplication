<?php
defined('BASEPATH') OR exit('Forbidden');

class Ajax extends CI_Controller{

    public function send(){
        $response = "error";


        /* This will test to make sure we have a non-empty $_POST array from
         * the form submission. */
        if (!empty($_POST)) {

            /* Each of these will strip anything harmful or extraneous out
             * of the submitted $_POST variables. */
            $name = substr(strip_tags(trim($_POST['name'])), 0, 64);
            $subject = substr(strip_tags(trim($_POST['subject'])), 0, 64);
            $message = substr(strip_tags(trim($_POST['message'])), 0, 1000);
            $from = filter_var($_POST['remail1'], FILTER_VALIDATE_EMAIL) ? $_POST['remail1'] : "";

            /* The cleaning routines above may leave any variable empty. If we
             * find an empty variable, we stop processing because that means
             * someone tried to send us something malicious or incorrect. */
            if (!empty($name) && !empty($from) && !empty($subject) && !empty($message)) {

                /* this forms the correct email headers to send an email */
                $headers = "From: $from\r\n";
                $headers .= "Reply-To: $from\r\n";
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";

                /* Now attempt to send the email. This uses a dummy email function
                 * because the student email server will not send mail. On a real
                 * server, you would use just "mail" instead of "mymail" and
                 * it will be sent normally.
                 */
                if (mail('kendallshearman@gmail.com', $subject, $name . "\n\n" . $message, $headers)) {
                    $response = 'okay';
                } else {
                    $response = 'mailerror';
                }
            } else {
                $response = 'varerror';
            }
        } else {
            $response = 'posterror';
        }
        echo $response;
    }

    public function register(){
        $response = 'error';
        if (!empty($_POST)) {

            $this->load->model('user_model');

            $username = substr(strip_tags(trim($_POST['username'])), 0, 64);
            $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ? $_POST['email'] : "";
            $password = substr(strip_tags(trim($_POST['password'])), 0, 64);

            if (!empty($username) && !empty($email) && !empty($password)) {
                if (($this->user_model->check_username_exists($username)) && ($this->user_model->check_email_exists($email))) {
                    //Load Model
                    $this->load->model('user_model');

                    // Encrypt password
                    $enc_password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

                    $this->user_model->register($username, $email, $enc_password);
                    $response = 'okay';
                }
            }
        } echo $response;
    }
}