<?php

namespace App\Models;

use CodeIgniter\Model;

class TempatModel extends Model
{
    // ... (properti $table, $primaryKey, dll. tetap sama) ...
    protected $table         = 'tempat';
    protected $primaryKey    = 'ID_tempat';
    protected $useTimestamps = false;
    protected $allowedFields = [
        'nama_tempat', 'kabupaten_kota', 'kecamatan', 'kelurahan', 
        'nama_jalan', 'kategori', 'deskripsi', 'foto', 'Maps'
    ];

    public function getTempat(array $options = [], int $perPage = 9)
    {
        // Pindahkan $this->select(...) ke sini agar lebih rapi
        $this->select('tempat.*');
        
        // Terapkan filter kategori jika ada
        if (!empty($options['category'])) {
            $this->where('tempat.kategori', $options['category']);
        }

        // Terapkan filter pencarian jika ada
        if (!empty($options['searchTerm'])) {
            $this->groupStart(); // Membuka kurung ( ... )
            $this->like('tempat.nama_tempat', $options['searchTerm']);
            $this->orLike('tempat.deskripsi', $options['searchTerm']);
            $this->orLike('tempat.kabupaten_kota', $options['searchTerm']);
            $this->groupEnd(); // Menutup kurung )
        }

        // Jalankan paginate() yang secara otomatis akan menangani semuanya
        // (menghitung total, mengambil data sesuai halaman)
        return [
            'data'  => $this->paginate($perPage),
            'total' => $this->pager->getTotal() // Ambil total dari Pager
        ];
    }
}