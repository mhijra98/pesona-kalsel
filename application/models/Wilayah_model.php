<?php defined('BASEPATH') or exit('No direct script access allowed');

class Wilayah_model extends CI_Model
{
    function get_kabupaten($id)
    {
        $hasil = $this->db->query("SELECT * FROM kabupaten WHERE kab_id_prov='$id'");
        return $hasil->result();
    }

    function get_kecamatan($id)
    {
        $hasil = $this->db->query("SELECT * FROM kecamatan WHERE kec_id_kab='$id'");
        return $hasil->result();
    }

    function get_ubah_kabupaten($id_prov)
    {
        $query = $this->db->get_where('kabupaten', array('kab_id_prov' => $id_prov));
        return $query;
    }

    function get_ubah_kecamatan($id_kab)
    {
        $query = $this->db->get_where('kecamatan', array('kec_id_kab' => $id_kab));
        return $query;
    }
}
