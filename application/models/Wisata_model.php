<?php defined('BASEPATH') or exit('No direct script access allowed');

class Wisata_model extends CI_Model
{
    public function getWisata()
    {
        $this->db->select('*');
        $this->db->from('wisata');
        $this->db->join('user', 'user.id=wisata.id_user');
        $this->db->join('ktg_wisata', 'ktg_wisata.id_ktg=wisata.id_ktg');
        $this->db->join('kabupaten', 'kabupaten.id_kab=wisata.w_id_kab');
        $this->db->join('kecamatan', 'kecamatan.id_kec=wisata.w_id_kec');
        $this->db->order_by('id_wisata', 'DESC');
        $this->db->where_in('acc', '1');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getWisataUser($id)
    {
        $this->db->select('*');
        $this->db->from('wisata');
        $this->db->join('user', 'user.id=wisata.id_user');
        $this->db->join('ktg_wisata', 'ktg_wisata.id_ktg=wisata.id_ktg');
        $this->db->join('kabupaten', 'kabupaten.id_kab=wisata.w_id_kab');
        $this->db->join('kecamatan', 'kecamatan.id_kec=wisata.w_id_kec');
        $this->db->order_by('id_wisata', 'DESC');
        $this->db->where_in('acc', '1');
        $this->db->where_in('id_user', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getWisataBaru()
    {
        $this->db->select('*');
        $this->db->from('wisata');
        $this->db->join('user', 'user.id=wisata.id_user');
        $this->db->join('kabupaten', 'kabupaten.id_kab=wisata.w_id_kab');
        $this->db->join('kecamatan', 'kecamatan.id_kec=wisata.w_id_kec');
        $this->db->order_by('id_wisata', 'DESC');
        $this->db->where_in('acc', '0');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getEventBaru()
    {
        $this->db->select('*');
        $this->db->from('event');
        $this->db->join('user', 'user.id=event.id_user');
        $this->db->join('kabupaten', 'kabupaten.id_kab=event.e_id_kab');
        $this->db->join('kecamatan', 'kecamatan.id_kec=event.e_id_kec');
        $this->db->order_by('id_event', 'DESC');
        $this->db->where_in('acc', '0');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function dataAcc($id)
    {
        $data = [
            'acc' => 1
        ];

        $this->db->where('id_wisata', $id);
        $this->db->update('wisata', $data);
    }

    public function dataAccEvent($id)
    {
        $data = [
            'acc' => 1
        ];

        $this->db->where('id_event', $id);
        $this->db->update('event', $data);
    }

    public function addNotifWisata($id_user, $nama)
    {
        $data = [
            'id_user' => $id_user,
            'notif_to' => '1',
            'nama' => $nama,
            'ket1' => 'diterima'
        ];

        $this->db->insert('notifikasi', $data);
    }

    public function addNotifEvent($id_user, $nama)
    {
        $data = [
            'id_user' => $id_user,
            'notif_to' => '2',
            'nama' => $nama,
            'ket1' => 'diterima'
        ];

        $this->db->insert('notifikasi', $data);
    }

    public function addNotifTolakWisata($id_user, $nama, $alasan)
    {
        $data = [
            'id_user' => $id_user,
            'notif_to' => '1',
            'nama' => $nama,
            'ket1' => 'ditolak',
            'ket2' => $alasan
        ];

        $this->db->insert('notifikasi', $data);
    }

    public function addNotifTolakEvent($id_user, $nama, $alasan)
    {
        $data = [
            'id_user' => $id_user,
            'notif_to' => '2',
            'nama' => $nama,
            'ket1' => 'ditolak',
            'ket2' => $alasan
        ];

        $this->db->insert('notifikasi', $data);
    }

    public function getNotifWisata($id)
    {
        $this->db->set('notifikasi');
        $this->db->from('notifikasi');
        $this->db->order_by('id', 'DESC');
        $this->db->where_in('id_user', $id);
        $this->db->where_in('notif_to', '1');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getNotifEvent($id)
    {
        $this->db->set('notifikasi');
        $this->db->from('notifikasi');
        $this->db->order_by('id', 'DESC');
        $this->db->where_in('id_user', $id);
        $this->db->where_in('notif_to', '2');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getWisataHome($limit, $start)
    {
        $this->db->select('*');
        $this->db->from('wisata');
        $this->db->join('user', 'user.id=wisata.id_user');
        $this->db->join('kabupaten', 'kabupaten.id_kab=wisata.w_id_kab');
        $this->db->join('kecamatan', 'kecamatan.id_kec=wisata.w_id_kec');
        $this->db->order_by('id_wisata', 'DESC');
        $this->db->where_in('acc', '1');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function pencarianWisata($keyword)
    {
        $this->db->select('*');
        $this->db->from('wisata');
        $this->db->join('user', 'user.id=wisata.id_user');
        $this->db->join('kabupaten', 'kabupaten.id_kab=wisata.w_id_kab');
        $this->db->join('kecamatan', 'kecamatan.id_kec=wisata.w_id_kec');
        $this->db->order_by('id_wisata', 'DESC');
        $this->db->like('nm_wisata', $keyword);
        $this->db->or_like('nama_kab', $keyword);
        $this->db->or_like('nama_kec', $keyword);
        $this->db->or_like('kategori', $keyword);
        $this->db->where_in('acc', '1');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function pencarianEvent($keyword)
    {
        $this->db->select('*');
        $this->db->from('event');
        $this->db->join('user', 'user.id=event.id_user');
        $this->db->join('kabupaten', 'kabupaten.id_kab=event.e_id_kab');
        $this->db->join('kecamatan', 'kecamatan.id_kec=event.e_id_kec');
        $this->db->order_by('id_event', 'DESC');
        $this->db->like('tema', $keyword);
        $this->db->or_like('nama_kab', $keyword);
        $this->db->or_like('nama_kec', $keyword);
        $this->db->or_like('jenis', $keyword);
        $this->db->where_in('acc', '1');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function dataWisataHome($id)
    {
        $this->db->select('*');
        $this->db->from('wisata');
        $this->db->join('ktg_wisata', 'ktg_wisata.id_ktg=wisata.id_ktg');
        $this->db->join('user', 'user.id=wisata.id_user');
        $this->db->join('kabupaten', 'kabupaten.id_kab=wisata.w_id_kab');
        $this->db->join('kecamatan', 'kecamatan.id_kec=wisata.w_id_kec');
        $this->db->where('id_wisata', $id);

        $query = $this->db->get();
        return $query->row_array();
    }

    public function dataeventHome($id)
    {
        $this->db->select('*');
        $this->db->from('event');
        $this->db->join('user', 'user.id=event.id_user');
        $this->db->join('kabupaten', 'kabupaten.id_kab=event.e_id_kab');
        $this->db->join('kecamatan', 'kecamatan.id_kec=event.e_id_kec');
        $this->db->where('id_event', $id);

        $query = $this->db->get();
        return $query->row_array();
    }

    public function getRincianWisata($id)
    {
        $this->db->select('*');
        $this->db->from('wisata');
        $this->db->join('user', 'user.id=wisata.id_user');
        $this->db->join('ktg_wisata', 'ktg_wisata.id_ktg=wisata.id_ktg');
        $this->db->join('kabupaten', 'kabupaten.id_kab=wisata.w_id_kab');
        $this->db->join('kecamatan', 'kecamatan.id_kec=wisata.w_id_kec');
        $this->db->where('id_wisata', $id);

        $query = $this->db->get();
        return $query->row_array();
    }

    public function getRincianEvent($id)
    {
        $this->db->select('*');
        $this->db->from('event');
        $this->db->join('user', 'user.id=event.id_user');
        $this->db->join('kabupaten', 'kabupaten.id_kab=event.e_id_kab');
        $this->db->join('kecamatan', 'kecamatan.id_kec=event.e_id_kec');
        $this->db->where('id_event', $id);

        $query = $this->db->get();
        return $query->row_array();
    }

    public function showGambar($id)
    {
        return $this->db->get_where('show_image_w', ['id_wisata' => $id])->result_array();
    }

    public function getWisataById($id)
    {
        return $this->db->get_where('wisata', ['id_wisata' => $id])->row_array();
    }

    function get_wisata_by_id($id) //javascript
    {
        $query = $this->db->get_where('wisata', array('id_wisata' =>  $id));
        return $query;
    }

    public function hapusWisata($id)
    {
        $this->db->delete('wisata', ['id_wisata' => $id]);
    }

    public function hapusnotif($id)
    {
        $this->db->delete('notifikasi', ['id' => $id]);
    }

    public function hapusGambarWisata($id)
    {
        $this->db->delete('show_image_w', ['id' => $id]);
    }

    public function ubahEvent($id)
    {
        $data = [
            "event" => $this->input->post('event'),
            "ket_event" => $this->input->post('keterangan')
        ];

        $this->db->where('id_wisata', $id);
        $this->db->update('wisata', $data);
    }

    public function ubahStatus($id)
    {
        $data = [
            "status" => $this->input->post('status'),
            "ket_status" => $this->input->post('keterangan')
        ];

        $this->db->where('id_wisata', $id);
        $this->db->update('wisata', $data);
    }

    public function getKategoriId($id)
    {
        return $this->db->get_where('ktg_wisata', ['id_ktg' => $id])->row_array();
    }

    public function hapusKategori($id)
    {
        $this->db->delete('ktg_wisata', ['id_ktg' => $id]);
    }

    public function getJumlahAlam()
    {
        return $this->db->get_where('wisata', ['id_ktg' => '1'])->num_rows();
    }

    public function getJumlahBuatan()
    {
        return $this->db->get_where('wisata', ['id_ktg' => '2'])->num_rows();
    }

    public function getJumlahKuliner()
    {
        return $this->db->get_where('wisata', ['id_ktg' => '3'])->num_rows();
    }

    public function getJumlahReligi()
    {
        return $this->db->get_where('wisata', ['id_ktg' => '4'])->num_rows();
    }

    public function getJumlahBudaya()
    {
        return $this->db->get_where('wisata', ['id_ktg' => '5'])->num_rows();
    }

    public function getJumlahEdukasi()
    {
        return $this->db->get_where('wisata', ['id_ktg' => '6'])->num_rows();
    }

    public function jumlahVerifWisata()
    {
        return $this->db->get_where('wisata', ['acc' => '0'])->num_rows();
    }

    public function jumlahVerifEvent()
    {
        return $this->db->get_where('event', ['acc' => '0'])->num_rows();
    }

    public function getWisataAlam()
    {
        $this->db->select('*');
        $this->db->from('wisata');
        $this->db->join('user', 'user.id=wisata.id_user');
        $this->db->join('kabupaten', 'kabupaten.id_kab=wisata.w_id_kab');
        $this->db->join('kecamatan', 'kecamatan.id_kec=wisata.w_id_kec');
        $this->db->order_by('id_wisata', 'DESC');
        $this->db->where_in('acc', '1');
        $this->db->where_in('id_ktg', '1');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getLapWisataAlam($idk, $idkc)
    {
        $this->db->select('*');
        $this->db->from('wisata');
        $this->db->join('user', 'user.id=wisata.id_user');
        $this->db->join('kabupaten', 'kabupaten.id_kab=wisata.w_id_kab');
        $this->db->join('kecamatan', 'kecamatan.id_kec=wisata.w_id_kec');
        $this->db->order_by('id_wisata', 'DESC');
        $this->db->where_in('w_id_kab', $idk);
        $this->db->where_in('w_id_kec', $idkc);
        $this->db->where_in('acc', '1');
        $this->db->where_in('id_ktg', '1');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getWisataBuatan()
    {
        $this->db->select('*');
        $this->db->from('wisata');
        $this->db->join('user', 'user.id=wisata.id_user');
        $this->db->join('kabupaten', 'kabupaten.id_kab=wisata.w_id_kab');
        $this->db->join('kecamatan', 'kecamatan.id_kec=wisata.w_id_kec');
        $this->db->order_by('id_wisata', 'DESC');
        $this->db->where_in('acc', '1');
        $this->db->where_in('id_ktg', '2');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getLapWisataBuatan($idk, $idkc)
    {
        $this->db->select('*');
        $this->db->from('wisata');
        $this->db->join('user', 'user.id=wisata.id_user');
        $this->db->join('kabupaten', 'kabupaten.id_kab=wisata.w_id_kab');
        $this->db->join('kecamatan', 'kecamatan.id_kec=wisata.w_id_kec');
        $this->db->order_by('id_wisata', 'DESC');
        $this->db->where_in('w_id_kab', $idk);
        $this->db->where_in('w_id_kec', $idkc);
        $this->db->where_in('acc', '1');
        $this->db->where_in('id_ktg', '2');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getWisataKuliner()
    {
        $this->db->select('*');
        $this->db->from('wisata');
        $this->db->join('user', 'user.id=wisata.id_user');
        $this->db->join('kabupaten', 'kabupaten.id_kab=wisata.w_id_kab');
        $this->db->join('kecamatan', 'kecamatan.id_kec=wisata.w_id_kec');
        $this->db->order_by('id_wisata', 'DESC');
        $this->db->where_in('acc', '1');
        $this->db->where_in('id_ktg', '3');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getLapWisataKuliner($idk, $idkc)
    {
        $this->db->select('*');
        $this->db->from('wisata');
        $this->db->join('user', 'user.id=wisata.id_user');
        $this->db->join('kabupaten', 'kabupaten.id_kab=wisata.w_id_kab');
        $this->db->join('kecamatan', 'kecamatan.id_kec=wisata.w_id_kec');
        $this->db->order_by('id_wisata', 'DESC');
        $this->db->where_in('w_id_kab', $idk);
        $this->db->where_in('w_id_kec', $idkc);
        $this->db->where_in('acc', '1');
        $this->db->where_in('id_ktg', '3');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getWisataReligi()
    {
        $this->db->select('*');
        $this->db->from('wisata');
        $this->db->join('user', 'user.id=wisata.id_user');
        $this->db->join('kabupaten', 'kabupaten.id_kab=wisata.w_id_kab');
        $this->db->join('kecamatan', 'kecamatan.id_kec=wisata.w_id_kec');
        $this->db->order_by('id_wisata', 'DESC');
        $this->db->where_in('acc', '1');
        $this->db->where_in('id_ktg', '4');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getLapWisataReligi($idk, $idkc)
    {
        $this->db->select('*');
        $this->db->from('wisata');
        $this->db->join('user', 'user.id=wisata.id_user');
        $this->db->join('kabupaten', 'kabupaten.id_kab=wisata.w_id_kab');
        $this->db->join('kecamatan', 'kecamatan.id_kec=wisata.w_id_kec');
        $this->db->order_by('id_wisata', 'DESC');
        $this->db->where_in('w_id_kab', $idk);
        $this->db->where_in('w_id_kec', $idkc);
        $this->db->where_in('acc', '1');
        $this->db->where_in('id_ktg', '4');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getWisataBudaya()
    {
        $this->db->select('*');
        $this->db->from('wisata');
        $this->db->join('user', 'user.id=wisata.id_user');
        $this->db->join('kabupaten', 'kabupaten.id_kab=wisata.w_id_kab');
        $this->db->join('kecamatan', 'kecamatan.id_kec=wisata.w_id_kec');
        $this->db->order_by('id_wisata', 'DESC');
        $this->db->where_in('acc', '1');
        $this->db->where_in('id_ktg', '5');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getLapWisataBudaya($idk, $idkc)
    {
        $this->db->select('*');
        $this->db->from('wisata');
        $this->db->join('user', 'user.id=wisata.id_user');
        $this->db->join('kabupaten', 'kabupaten.id_kab=wisata.w_id_kab');
        $this->db->join('kecamatan', 'kecamatan.id_kec=wisata.w_id_kec');
        $this->db->order_by('id_wisata', 'DESC');
        $this->db->where_in('w_id_kab', $idk);
        $this->db->where_in('w_id_kec', $idkc);
        $this->db->where_in('acc', '1');
        $this->db->where_in('id_ktg', '5');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getWisataEdukasi()
    {
        $this->db->select('*');
        $this->db->from('wisata');
        $this->db->join('user', 'user.id=wisata.id_user');
        $this->db->join('kabupaten', 'kabupaten.id_kab=wisata.w_id_kab');
        $this->db->join('kecamatan', 'kecamatan.id_kec=wisata.w_id_kec');
        $this->db->order_by('id_wisata', 'DESC');
        $this->db->where_in('acc', '1');
        $this->db->where_in('id_ktg', '6');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getLapWisataEdukasi($idk, $idkc)
    {
        $this->db->select('*');
        $this->db->from('wisata');
        $this->db->join('user', 'user.id=wisata.id_user');
        $this->db->join('kabupaten', 'kabupaten.id_kab=wisata.w_id_kab');
        $this->db->join('kecamatan', 'kecamatan.id_kec=wisata.w_id_kec');
        $this->db->order_by('id_wisata', 'DESC');
        $this->db->where_in('w_id_kab', $idk);
        $this->db->where_in('w_id_kec', $idkc);
        $this->db->where_in('acc', '1');
        $this->db->where_in('id_ktg', '6');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getLapDataTamu()
    {
        $tanggal1 = $this->input->post('tanggal1', true);
        $tanggal2 = $this->input->post('tanggal2', true);

        $this->db->where('tgl >=', $tanggal1);
        $this->db->where('tgl <=', $tanggal2);

        return $this->db->get('buku_tamu')->result_array();
    }

    public function getLapDaftar()
    {
        $tanggal1 = $this->input->post('tanggal1', true);
        $tanggal2 = $this->input->post('tanggal2', true);

        $this->db->where('date_created >=', $tanggal1);
        $this->db->where('date_created <=', $tanggal2);

        return $this->db->get('user')->result_array();
    }

    public function getEvent()
    {
        $this->db->select('*');
        $this->db->from('event');
        $this->db->join('user', 'user.id=event.id_user');
        $this->db->join('kabupaten', 'kabupaten.id_kab=event.e_id_kab');
        $this->db->join('kecamatan', 'kecamatan.id_kec=event.e_id_kec');
        $this->db->order_by('id_event', 'DESC');
        $this->db->where_in('acc', '1');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getEventUser($id)
    {
        $this->db->select('*');
        $this->db->from('event');
        $this->db->join('user', 'user.id=event.id_user');
        $this->db->join('kabupaten', 'kabupaten.id_kab=event.e_id_kab');
        $this->db->join('kecamatan', 'kecamatan.id_kec=event.e_id_kec');
        $this->db->order_by('id_event', 'DESC');
        $this->db->where_in('acc', '1');
        $this->db->where_in('id_user', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getEventById($id)
    {
        return $this->db->get_where('event', ['id_event' => $id])->row_array();
    }

    public function getdataguruid($id)
    {
        return $this->db->get_where('data_guru', ['id' => $id])->row_array();
    }

    public function hapusguru($id)
    {
        $this->db->delete('data_guru', ['id' => $id]);
    }

    function get_event_by_id($id) //javascript
    {
        $query = $this->db->get_where('event', array('id_event' =>  $id));
        return $query;
    }

    public function hapusEvent($id)
    {
        $this->db->delete('event', ['id_event' => $id]);
    }

    public function getLapEventWisata($idk, $idkc)
    {
        $this->db->select('*');
        $this->db->from('event');
        $this->db->join('user', 'user.id=event.id_user');
        $this->db->join('kabupaten', 'kabupaten.id_kab=event.e_id_kab');
        $this->db->join('kecamatan', 'kecamatan.id_kec=event.e_id_kec');
        $this->db->where_in('e_id_kab', $idk);
        $this->db->where_in('e_id_kec', $idkc);
        $this->db->where_in('acc', '1');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getAllWisataTutup()
    {
        $this->db->select('*');
        $this->db->from('wisata');
        $this->db->join('user', 'user.id=wisata.id_user');
        $this->db->join('ktg_wisata', 'ktg_wisata.id_ktg=wisata.id_ktg');
        $this->db->join('kabupaten', 'kabupaten.id_kab=wisata.w_id_kab');
        $this->db->join('kecamatan', 'kecamatan.id_kec=wisata.w_id_kec');
        $this->db->where_in('status', 'Tutup');
        $this->db->where_in('acc', '1');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getLaptWisataTutup($idk, $idkc)
    {
        $this->db->select('*');
        $this->db->from('wisata');
        $this->db->join('user', 'user.id=wisata.id_user');
        $this->db->join('kabupaten', 'kabupaten.id_kab=wisata.w_id_kab');
        $this->db->join('kecamatan', 'kecamatan.id_kec=wisata.w_id_kec');
        $this->db->where_in('status', 'Tutup');
        $this->db->where_in('w_id_kab', $idk);
        $this->db->where_in('w_id_kec', $idkc);
        $this->db->where_in('acc', '1');
        $query = $this->db->get();
        return $query->result_array();
    }
}
