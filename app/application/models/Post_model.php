<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post_model extends CI_Model {
    private $_table = 'posts';

    public function rules(){
        return [
            ['field' => 'post_title',
            'label' => 'Post Title',
            'rules' => 'required'],

            ['field' => 'post_body',
            'label' => 'Post Body',
            'rules' => 'required'],
        ];
    }

    function create($title, $body, $cat, $posted_by){
        $slug = strtolower($title);
        $slug = str_replace(' ', '-', $slug);

        $data = array(
            'post_title' => $title,
            'post_body' => $body,
            'post_slug' => $slug,
            'post_cat' => $cat,
            'posted_by' => $posted_by
        );

        return $this->db->insert($this->_table, $data);
    }

    function getAll(){
        $this->db
                ->select('*')
                ->from($this->_table)
                ->join('users', 'users.user_id = posts.posted_by')
                ->join('category', 'category.cat_id = posts.post_cat');
        $query = $this->db->get();
        return $query->result();
    }

    function getBy_cat($cat_id){
        $this->db
                ->select('*')
                ->from($this->_table)
                ->join('users', 'users.user_id = posts.posted_by')
                ->join('category', 'category.cat_id = posts.post_cat')
                ->where('post_cat', $cat_id);
        $query = $this->db->get();

        if( !$query || !$query->num_rows() > 0 ){
            throw new Exception('No data found!');
        }

        return $query->result();
    }

    function getBy_user($user_id){
        $this->db
                ->select('*')
                ->from($this->_table)
                ->join('users', 'users.user_id = posts.posted_by')
                ->join('category', 'category.cat_id = posts.post_cat')
                ->where('posted_by', $user_id);
        $query = $this->db->get();

        if( !$query || !$query->num_rows() > 0 ){
            throw new Exception('No data found!');
        }

        return $query->result();
    }

    function update($post_id){
        $query = $this->db->get_where($this->_table, array( 'post_id' => $post_id ));

        if( !$query || !$query->num_rows() > 0 ){
            throw new Exception('No data found!');
        }
        return $query->result();
    }

    function delete($post_id){
        $query = $this->db->delete($this->_table, array( 'post_id' => $post_id ));
        return $query;
    }
}