<?php
defined('BASEPATH') or exit('No direct script access allowed');

class userModel extends CI_Model
{
    public function hapusData($where, $table)
    {
    }
    public function tambahUser($data)
    {
        $this->db->insert('user', $data);
    }
}
