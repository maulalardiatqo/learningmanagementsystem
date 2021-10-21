<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal_model extends CI_Model
{
    public function getJadwal(){
    $query = "SELECT * FROM jadwal
    INNER JOIN kelas ON jadwal.id_kelas = kelas.id_kelas
    INNER JOIN mapel ON jadwal.id_mapel = mapel.id_mapel
    INNER JOIN guru ON jadwal.id_guru = guru.id_guru
    ";
    return $this->db->query($query)->result_array();

    }
}