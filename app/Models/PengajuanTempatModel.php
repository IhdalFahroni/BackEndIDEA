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
        return $this->select('form_pengajuantempat.*, akun.username as username, akun.email as email')
                    ->join('akun', 'akun.ID_akun = form_pengajuantempat.ID_akun', 'left')
                    ->get()
                    ->getResultArray();
    }
}