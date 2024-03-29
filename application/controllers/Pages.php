<?php
defined('BASEPATH') OR exit('Forbidden');

class Pages extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->model('user_model');
    }

    public function view($page = 'home'){
        if ( file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
            $data['title'] = ucfirst($page); // Capitalize the first letter

            $this->load->view('templates/header', $data);
            $this->load->view('pages/'.$page);
            $this->load->view('templates/footer');

        } else {
            // Whoops, we don't have a page for that!
           /* show_404();*/
            $data['title'] = ucfirst($page); // Capitalize the first letter

            $this->load->view('templates/header', $data);
            $this->load->view('pages/custom404');
            $this->load->view('templates/footer');
        }


    }
}