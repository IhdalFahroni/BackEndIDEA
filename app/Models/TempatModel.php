<?php

namespace App\Models;

use CodeIgniter\Model;

class TempatModel extends Model
{
    protected $table            = 'tempat';
    protected $primaryKey       = 'ID_tempat';
    protected $useTimestamps    = false;
    protected $allowedFields    = [
        'nama_tempat', 'kabupaten_kota', 'kecamatan', 'kelurahan', 
        'nama_jalan', 'kategori', 'deskripsi', 'foto', 'Maps'
    ];

    /**
     * Fungsi utama untuk mengambil data dengan filter, pencarian, dan pagination.
     *
     * @param array $options Berisi 'searchTerm', 'category'
     * @param int $perPage Jumlah item per halaman
     * @return array Data yang sudah dipaginasi
     */
    public function getTempat(array $options = [], int $perPage = 9)
    {
        $builder = $this->db->table($this->table);

        // Menggabungkan dengan tabel detail (wisata/kuliner)
        $builder->join('tempat_wisata', 'tempat.ID_tempat = tempat_wisata.ID_tempat', 'left');
        $builder->join('tempat_kuliner', 'tempat.ID_tempat = tempat_kuliner.ID_tempat', 'left');
        $builder->select('tempat.*, tempat_wisata.harga_tiket, tempat_kuliner.ID_akun as ID_pemilik');
        
        // Terapkan filter kategori jika ada
        if (!empty($options['category'])) {
            $builder->where('tempat.kategori', $options['category']);
        }

        // Terapkan filter pencarian jika ada
        if (!empty($options['searchTerm'])) {
            $builder->groupStart(); // Membuka kurung ( ... )
            $builder->like('tempat.nama_tempat', $options['searchTerm']);
            $builder->orLike('tempat.deskripsi', $options['searchTerm']);
            $builder->orLike('tempat.kabupaten_kota', $options['searchTerm']);
            $builder->groupEnd(); // Menutup kurung )
        }

        // Lakukan pagination pada query yang sudah difilter
        return [
            'data'  => $builder->get($perPage, ($options['page'] - 1) * $perPage)->getResultArray(),
            'total' => $builder->countAllResults(false) // Hitung total tanpa mereset query
        ];
    }
}