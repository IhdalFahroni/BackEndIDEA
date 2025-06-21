<?php

namespace App\Models;

use CodeIgniter\Model;

class MenuModel extends Model
{
    protected $table            = 'menu';
    
    // Menggunakan 'id_menu' agar konsisten (konvensi snake_case)
    protected $primaryKey       = 'ID_menu';

    // Sesuaikan field ini agar cocok dengan Controller dan View
    protected $allowedFields    = [
        'ID_tempat', 
        'nama_menu',
        'deskripsi_menu',
        'harga_menu',
        'foto_menu'
    ];

    // Menambahkan konfigurasi timestamp
    protected $useTimestamps    = false;
    protected $createdField     = '';
    protected $updatedField     = '';

    /**
     * FUNGSI PENTING: Mengambil semua item menu berdasarkan ID tempat.
     * Fungsi ini dipanggil oleh Home Controller Anda.
     */
    public function getMenuByTempatId($id_tempat)
    {
        return $this->where('id_tempat', $id_tempat)->findAll();
    }
}