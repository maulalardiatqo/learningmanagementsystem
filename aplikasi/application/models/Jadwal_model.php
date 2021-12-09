<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal_model extends CI_Model
{
    public function getJadwal($id_guru = null, $id_kelas = null)
    {
        $query = "SELECT *, jmm.pukul as pukul_masuk, jmk.pukul as pukul_keluar FROM jadwal
    INNER JOIN kelas ON jadwal.id_kelas = kelas.id_kelas
    INNER JOIN mapel ON jadwal.id_mapel = mapel.id_mapel
    INNER JOIN guru ON jadwal.id_guru = guru.id_guru
    INNER JOIN jam_mengajar as jmm ON jadwal.jam_masuk = jmm.id_jam
    INNER JOIN jam_mengajar as jmk ON jadwal.jam_keluar = jmk.id_jam
    ";
        if ($id_guru) {
            $query .= " where jadwal.id_guru=$id_guru";
        }
        if ($id_kelas) {
            $query .= " where jadwal.id_kelas=$id_kelas";
        }

        return $this->db->query($query)->result_array();
    }
}
