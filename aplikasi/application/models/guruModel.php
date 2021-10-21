<?php
defined('BASEPATH') or exit('No direct script access allowed');

class guruModel extends CI_Model{
    public function hapusData($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }
}