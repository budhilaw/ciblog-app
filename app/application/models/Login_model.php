<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {
    function login( $username, $password )
    {
        $result = array(
            'error' => false
        );

        $query = $this->db
                ->select('*')
                ->from('users')
                ->where('username', $username)
                ->get();

        if( $query->num_rows() != 1 ){
			$result = array(
				'error' => true,
				'msg' => 'The username is incorrect'
			);
            return $result;
            die();
        }

        $row = $query->row();
        if( !password_verify($password, $row->password) ){
			$result = array(
				'error' => true,
				'msg' => 'The password is incorrect'
			);
            return $result;
            die();
        }

        $result = array(
            'error' => false,
            'email' => $row->email,
            'name' => $row->name
        );

        return $result;
    }

    function hash($string)
    {
        $pass = password_hash($string, PASSWORD_DEFAULT);
        return $pass;
    }
}