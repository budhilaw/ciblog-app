<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once './vendor/fzaninotto/faker/src/autoload.php';

class Post extends MY_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('User_model', 'user');
        $this->load->model('Category_model', 'category');
    }

    public function index(){
        $title = 'All Posts';
        $uri = $this->uri->segment(2);
        $posts = $this->post->getAll();
        return view('admins.posts', ['title' => $title, 'uri' => $uri, 'posts' => $posts]);
    }

    public function postsBy_cat($id){
        $title = 'All Posts';
        $uri = $this->uri->segment(2);
        $posts = $this->post->getBy_cat($id);
        return view('admins.posts', ['title' => $title, 'uri' => $uri, 'posts' => $posts]);
    }

    public function postsBy_user($id){
        $title = 'All Posts';
        $uri = $this->uri->segment(2);
        $posts = $this->post->getBy_user($id);
        return view('admins.posts', ['title' => $title, 'uri' => $uri, 'posts' => $posts]);
    }

    public function addPost(){
        $title = 'Add Post';
        $uri = $this->uri->segment(3);
        $categories = $this->category->getAll();
        $csrf = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
        );
        return view('admins.addpost', ['title' => $title, 'uri' => $uri, 'categories' => $categories, 'csrf' => $csrf]);
    }

    public function storePost(){
        if( !$_POST ){
            header('Location: /admin/post/new');
            die();
        }

        $validation = $this->form_validation;
        $validation->set_rules($this->post->rules());

        if ( !$validation->run() ){
            return $this->addPost();
        }

        // Data
        $title = $this->input->post('post_title', TRUE);
        $body = $this->input->post('post_body', TRUE);
        $posted_by = $this->user->getBy_username($this->session->userdata('username'));
        $cat = $this->input->post('post_cat');

        if( empty($cat) ){
            $cat = 1; // set to uncategorized
        }

        $this->post->create($title, $body, $cat, $posted_by->user_id);
        $this->session->set_flashdata('success', 'Yaay! Your article has been posted!');
        header('Location: /admin/post/new');
    }

    public function delete($id){
        if( !$id ){
            header('Location: /admin/post');
        }
        $this->post->delete($id);
        $this->session->set_flashdata('success', 'The post has beed deleted!');
        header('Location: /admin/post');
    }
}