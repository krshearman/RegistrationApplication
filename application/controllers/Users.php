<?php


class Users extends CI_Controller {

    public function view($page = 'signin') {

        if ( file_exists(APPPATH.'views/users/'.$page.'.php')) {

        $data['title'] = ucfirst($page);

        $this->load->view('templates/header', $data);
        $this->load->view('users/'.$page, $data);
        $this->load->view('templates/footer', $data);

        } else {
            // Whoops, we don't have a page for that!
            /* show_404();*/
            $data['title'] = ucfirst($page); // Capitalize the first letter

            $this->load->view('templates/header', $data);
            $this->load->view('pages/custom404', $data);
            $this->load->view('templates/footer', $data);
        }
    }

}