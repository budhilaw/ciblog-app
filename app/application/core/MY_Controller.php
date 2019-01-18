<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
    public function __construct(){
        parent::__construct();

        if( !$this->session->userdata('username') ){
            header('Location: /login');
        }

        $this->load->model('Post_model', 'post');

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
    }
}