<?php defined('BASEPATH') or exit('No direct script access allowed');

class Penginapan_model extends CI_Model
{
    public function getPenginapan()
    {
        $this->db->select('*');
        $this->db->from('penginapan');
        $this->db->join('user', 'user.id=penginapan.id_user');
        $this->db->join('kabupaten', 'kabupaten.id_kab=penginapan.p_id_kab');
        $this->db->join('kecamatan', 'kecamatan.id_kec=penginapan.p_id_kec');
        $this->db->order_by('id_penginapan', 'DESC');
        $this->db->where_in('acc', '1');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getPenginapanBaru()
    {
        $this->db->select('*');
        $this->db->from('penginapan');
        $this->db->join('user', 'user.id=penginapan.id_user');
        $this->db->join('kabupaten', 'kabupaten.id_kab=penginapan.p_id_kab');
        $this->db->join('kecamatan', 'kecamatan.id_kec=penginapan.p_id_kec');
        $this->db->order_by('id_penginapan', 'DESC');
        $this->db->where_in('acc', '0');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function dataAcc($id)
    {
        $data = [
            'acc' => 1
        ];

        $this->db->where('id_penginapan', $id);
        $this->db->update('penginapan', $data);
    }

    public function addNotifPenginapan($id_user, $nama)
    {
        $data = [
            'id_user' => $id_user,
            'notif_to' => '3',
            'nama' => $nama,
            'ket1' => 'diterima'
        ];

        $this->db->insert('notifikasi', $data);
    }

    public function addNotifTolakPenginapan($id_user, $nama, $alasan)
    {
        $data = [
            'id_user' => $id_user,
            'notif_to' => '3',
            'nama' => $nama,
            'ket1' => 'ditolak',
            'ket2' => $alasan
        ];

        $this->db->insert('notifikasi', $data);
    }

    public function getNotifPenginapan($id)
    {
        $this->db->set('notifikasi');
        $this->db->from('notifikasi');
        $this->db->order_by('id', 'DESC');
        $this->db->where_in('id_user', $id);
        $this->db->where_in('notif_to', '3');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getPenginapanUser($id)
    {
        $this->db->select('*');
        $this->db->from('penginapan');
        $this->db->join('user', 'user.id=penginapan.id_user');
        $this->db->join('kabupaten', 'kabupaten.id_kab=penginapan.p_id_kab');
        $this->db->join('kecamatan', 'kecamatan.id_kec=penginapan.p_id_kec');
        $this->db->order_by('id_penginapan', 'DESC');
        $this->db->where_in('acc', '1');
        $this->db->where_in('id_user', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getPenginapanHome($limit, $start)
    {
        $this->db->select('*');
        $this->db->from('penginapan');
        $this->db->join('user', 'user.id=penginapan.id_user');
        $this->db->join('kabupaten', 'kabupaten.id_kab=penginapan.p_id_kab');
        $this->db->join('kecamatan', 'kecamatan.id_kec=penginapan.p_id_kec');
        $this->db->order_by('id_penginapan', 'DESC');
        $this->db->where_in('acc', '1');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function pencarianPenginapan($keyword)
    {
        $this->db->select('*');
        $this->db->from('penginapan');
        $this->db->join('user', 'user.id=penginapan.id_user');
        $this->db->join('kabupaten', 'kabupaten.id_kab=penginapan.p_id_kab');
        $this->db->join('kecamatan', 'kecamatan.id_kec=penginapan.p_id_kec');
        $this->db->order_by('id_penginapan', 'DESC');
        $this->db->like('nm_penginapan', $keyword);
        $this->db->or_like('nama_kab', $keyword);
        $this->db->or_like('nama_kec', $keyword);
        $this->db->where_in('acc', '1');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function dataPenginapanHome($id)
    {
        $this->db->select('*');
        $this->db->from('penginapan');
        $this->db->join('user', 'user.id=penginapan.id_user');
        $this->db->join('kabupaten', 'kabupaten.id_kab=penginapan.p_id_kab');
        $this->db->join('kecamatan', 'kecamatan.id_kec=penginapan.p_id_kec');
        $this->db->where('id_penginapan', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function getRincianPenginapan($id)
    {
        $this->db->select('*');
        $this->db->from('penginapan');
        $this->db->join('user', 'user.id=penginapan.id_user');
        $this->db->join('kabupaten', 'kabupaten.id_kab=penginapan.p_id_kab');
        $this->db->join('kecamatan', 'kecamatan.id_kec=penginapan.p_id_kec');
        $this->db->order_by('id_penginapan', 'DESC');
        $this->db->where('id_penginapan', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function jumlahVerifHotel()
    {
        return $this->db->get_where('penginapan', ['acc' => '0'])->num_rows();
    }

    public function showGambar($id)
    {
        return $this->db->get_where('show_image_pe', ['id_penginapan' => $id])->result_array();
    }

    public function getPenginapanById($id)
    {
        return $this->db->get_where('penginapan', ['id_penginapan' => $id])->row_array();
    }

    function get_penginapan_by_id($id)
    {
        $query = $this->db->get_where('penginapan', array('id_penginapan' =>  $id));
        return $query;
    }

    public function hapusPenginapan($id)
    {
        $this->db->delete('penginapan', ['id_penginapan' => $id]);
    }

    public function hapusGambarPenginapan($id)
    {
        $this->db->delete('show_image_pe', ['id' => $id]);
    }

    public function hapusnotif($id)
    {
        $this->db->delete('notifikasi', ['id' => $id]);
    }

    public function getLapPenginapan($idk, $idkc)
    {
        $this->db->select('*');
        $this->db->from('penginapan');
        $this->db->join('user', 'user.id=penginapan.id_user');
        $this->db->join('kabupaten', 'kabupaten.id_kab=penginapan.p_id_kab');
        $this->db->join('kecamatan', 'kecamatan.id_kec=penginapan.p_id_kec');
        $this->db->where_in('p_id_kab', $idk);
        $this->db->where_in('p_id_kec', $idkc);
        $this->db->where_in('acc', '1');
        $query = $this->db->get();
        return $query->result_array();
    }
}
