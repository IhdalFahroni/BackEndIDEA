<?php

namespace App\Models;

use CodeIgniter\Model;

class PromoModel extends Model
{
    // Menggunakan nama tabel 'promo'
    protected $table            = 'promo';
    
    // Menggunakan 'id_promo' agar konsisten (konvensi)
    protected $primaryKey       = 'ID_promo';

    // Sesuaikan field ini agar cocok dengan Controller dan View
    protected $allowedFields    = [
        'ID_tempat', 
        'nama_promo',
        'deskripsi_promo', 
        'valid_until'
    ];

    // Menambahkan konfigurasi timestamp
    protected $useTimestamps    = false;
    protected $createdField     = '';
    protected $updatedField     = '';

    public function getPromoByTempatId($id_tempat)
    {
        return $this->where('id_tempat', $id_tempat)->findAll();
    }
}