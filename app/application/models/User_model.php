<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    protected $_table = 'users';

    public function rules(){
        return [
            [
                'field' => 'name',
                'label' => 'Name',
                'rules' => 'required'
            ],
            [
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'trim|required|valid_email'
            ],
            [
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'trim|required|min_length[3]'
            ],
            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required'
            ],
            [
                'field' => 'confirm_password',
                'label' => 'Confirm Password',
                'rules' => 'required|matches[password]'
            ],
        ];
    }

    function create($name, $email, $username, $password){
        $data = array(
            'name' => $name,
            'email' => $email,
            'username' => $username,
            'password' => $this->hash($password)
        );

        return $this->db->insert($this->_table, $data);
    }

    function getAll(){
        $query = $this->db->get($this->_table);
        return $query->result();
    }

    function getBy_id($user_id){
        $query = $this->db->get_where($this->_table, array( 'user_id' => $user_id ));
        if( !$query || !$query->num_rows() > 0 ){
            throw new Exception('No data found!');
        }
        return $query->row();
    }

    function getBy_username($username){
        $query = $this->db->get_where($this->_table, array( 'username' => $username ));
        if( !$query || !$query->num_rows() > 0 ){
            throw new Exception('No data found!');
        }
        return $query->row();
    }

    function update($post_id){
        $query = $this->db->get_where($this->_table, array( 'user_id' => $post_id ));

        if( !$query || !$query->num_rows() > 0 ){
            throw new Exception('No data found!');
        }
        return $query->result();
    }

    function delete($user_id){
        $query = $this->db->delete($this->_table, array( 'user_id' => $user_id ));
        return $query;
    }

    function hash($string)
    {
        $pass = password_hash($string, PASSWORD_DEFAULT);
        return $pass;
    }
}