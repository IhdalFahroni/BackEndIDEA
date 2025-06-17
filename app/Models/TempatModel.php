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
    public function getDestinasiWithRating()
    {
        // Menggunakan Query Builder CodeIgniter
        $builder = $this->db->table('tempat');
        $builder->select('tempat.*, AVG(review.rating) as average_rating'); // Memilih semua kolom dari 'tempat' dan menghitung rata-rata rating
        $builder->join('review', 'review.ID_tempat = tempat.ID_tempat', 'left'); // LEFT JOIN ke tabel 'review'
        $builder->groupBy('tempat.ID_tempat'); // Mengelompokkan hasil berdasarkan ID tempat
        
        // Anda bisa menambahkan order by jika perlu, misalnya berdasarkan nama atau rating
        // $builder->orderBy('average_rating', 'DESC'); 

        return $builder->get()->getResultArray(); // Eksekusi query dan kembalikan hasilnya sebagai array
    }
    
    // Jika Anda ingin mengambil data dengan pagination
    public function getDestinasiWithRatingPaginated()
    {
        return $this->select('tempat.*, AVG(review.rating) as average_rating')
                    ->join('review', 'review.ID_tempat = tempat.ID_tempat', 'left')
                    ->groupBy('tempat.ID_tempat');
    }

    public function getTempat(array $options = [], int $perPage = 9)
    {
        // 1. Panggil metode select, join, dll. langsung dari "$this" (instance Model).
        //    Jangan buat variabel $builder terpisah.
        $this->select('tempat.*, AVG(review.rating) as average_rating');
        $this->join('review', 'review.ID_tempat = tempat.ID_tempat', 'left');

        // 2. Terapkan filter kategori jika ada
        if (!empty($options['category'])) {
            $this->where('tempat.kategori', $options['category']);
        }

        // 3. Terapkan filter pencarian jika ada
        if (!empty($options['searchTerm'])) {
            $this->groupStart();
            $this->like('tempat.nama_tempat', $options['searchTerm']);
            $this->orLike('tempat.deskripsi', $options['searchTerm']);
            $this->orLike('tempat.kabupaten_kota', $options['searchTerm']);
            $this->groupEnd();
        }

        // 4. Kelompokkan hasil. Ini tetap sangat penting.
        $this->groupBy('tempat.ID_tempat');

        // 5. Panggil paginate() dari "$this". Sekarang Intelephense tidak akan error.
        $data = $this->paginate($perPage);
        
        // 6. Kembalikan data dan pager.
        return [
            'data'  => $data,
            'pager' => $this->pager
        ];
    }
}