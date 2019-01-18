<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model {
    protected $table = 'category';

    function getAll(){
        $query = $this->db->get($this->table);
        return $query->result();
    }
}