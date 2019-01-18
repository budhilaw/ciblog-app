<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once './vendor/fzaninotto/faker/src/autoload.php';

class Dashboard extends MY_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('User_model', 'user');
    }

    public function index(){
        $title = 'Dashboard';
        $uri = $this->uri->segment(2);
        if( empty($uri) ){
            $uri = $this->uri->segment(1);
        }
        return view('admins.dashboard', ['title' => $title, 'uri' => $uri]);
    }
}