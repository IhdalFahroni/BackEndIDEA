<?php

namespace App\Models;

use CodeIgniter\Model;

class TempatModel extends Model
{
    protected $table         = 'tempat';
    protected $primaryKey    = 'ID_tempat';
    protected $useTimestamps = false;
    protected $allowedFields = [
        'nama_tempat', 'kabupaten_kota', 'kecamatan', 'kelurahan',
        'nama_jalan', 'kategori', 'deskripsi', 'foto', 'Maps'
    ];

    /**
     * Fungsi utama untuk mengambil data tempat dengan filter, rating, dan pagination.
     * Ini adalah satu-satunya fungsi publik yang Anda perlukan untuk fitur ini.
     *
     * @param array $options Opsi filter seperti ['category' => '...', 'searchTerm' => '...']
     * @param int   $perPage Jumlah item per halaman
     * @return array Mengembalikan data dan objek pager
     */
    public function getTempat(array $options = [], int $perPage = 9)
    {
        // 1. Mulai query dengan SELECT dan JOIN yang dibutuhkan untuk rating.
        // Chaining (menyambung method) membuat kode lebih ringkas.
        $this->select('tempat.*, AVG(review.rating) as average_rating')
             ->join('review', 'review.ID_tempat = tempat.ID_tempat', 'left');

        // 2. Terapkan filter kategori jika ada dan nilainya valid.
        if (!empty($options['category']) && in_array($options['category'], ['tourist_destination', 'culinary'])) {
            $this->where('tempat.kategori', $options['category']);
        }

        // 3. Terapkan filter pencarian jika ada.
        if (!empty($options['searchTerm'])) {
            $this->groupStart() // ( ...
                 ->like('tempat.nama_tempat', $options['searchTerm'])
                 ->orLike('tempat.deskripsi', $options['searchTerm'])
                 ->orLike('tempat.kabupaten_kota', $options['searchTerm'])
                 ->groupEnd();   // ... )
        }

        // 4. Kelompokkan hasil untuk kalkulasi AVG() dan paginasi yang benar.
        $this->groupBy('tempat.ID_tempat');
        $this->orderBy('tempat.nama_tempat', 'ASC');
        // 5. Kembalikan data yang sudah dipaginasi beserta objek pager-nya.
        return [
            'data'  => $this->paginate($perPage),
            'pager' => $this->pager,
        ];
    }
}