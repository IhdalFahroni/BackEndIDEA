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
        'nama_jalan', 'kategori', 'deskripsi', 'harga_tiket', 'foto', 'google_maps'
    ];
}