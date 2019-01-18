<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once './vendor/fzaninotto/faker/src/autoload.php';

class User extends MY_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('User_model', 'user');
        $this->load->model('Category_model', 'category');
    }

    public function index(){
        $title = 'All Users';
        $uri = $this->uri->segment(2);
        $users = $this->user->getAll();
        return view('admins.users', ['title' => $title, 'uri' => $uri, 'users' => $users]);
    }

    public function addUser(){
        $title = 'Add User';
        $uri = $this->uri->segment(3);
        $csrf = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
        );
        return view('admins.adduser', ['title' => $title, 'uri' => $uri, 'csrf' => $csrf]);
    }

    public function storeUser(){
        if( !$_POST ){
            header('Location: /admin/user/add');
            die();
        }

        $validation = $this->form_validation;
        $validation->set_rules($this->user->rules());

        if ( !$validation->run() ){
            return $this->addUser();
        }

        // Data
        $name = $this->input->post('name', TRUE);
        $email = $this->input->post('email', TRUE);
        $username = $this->input->post('username', TRUE);
        $password = $this->input->post('password', TRUE);

        $this->user->create($name, $email, $username, $password);

        $this->session->set_flashdata('success', 'Yaay! The user has been created!');
        header('Location: /admin/user/add');
    }

    public function delete($id){
        if( !$id ){
            header('Location: /admin/user');
        }
        $this->user->delete($id);
        $this->session->set_flashdata('success', 'The user has beed deleted!');
        header('Location: /admin/user');
    }
}