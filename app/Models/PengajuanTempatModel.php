<?php

namespace App\Models;

use CodeIgniter\Model;

class PengajuanTempatModel extends Model
{
    protected $table         = 'form_pengajuantempat';
    protected $primaryKey    = 'ID_formPengajuanTempat';
    protected $useTimestamps = false;
    protected $allowedFields = [
        'ID_akun', 'nama_tempat', 'kabupaten_kota', 'kecamatan', 'kelurahan',
        'nama_jalan', 'kategori', 'deskripsi', 'harga_tiket', 'foto', 'google_maps', 'is_verified'
    ];
    public function getAddPlaceForm()
    {
       $this->select('form_pengajuantempat.*, akun.username, akun.email');
       $this->from('form_pengajuantempat');
       $this->join('akun', 'akun.ID_akun = form_pengajuantempat.ID_akun', 'left');

        // get() dikosongkan karena 'from' sudah didefinisikan sebelumnya
        $query = $this->get(); 

        return $query->result_array();
    }
}