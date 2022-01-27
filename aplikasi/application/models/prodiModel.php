<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prodi_model extends CI_Model
{
    public function prodi($Nprodi)
    {
        $this->db->select('*');
        $this->db->from('kelas');
        $this->db->join('guru', 'guru.nuptk = kelas.wali_kelas');
    }
}
