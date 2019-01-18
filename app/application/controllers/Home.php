<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Post_model', 'post');
	}

	public function index()
	{
		$title = 'Blog';
		$posts = $this->post->getAll();
		return view('index', ['title' => $title, 'posts' => $posts]);
	}

	public function test(){
		$data = array(
			'name' => 'Kai',
			'desc' => 'Lorem ipsum sit dolor amet'
		);
		return view('percobaan', ['posts' => $data]);
	}
}