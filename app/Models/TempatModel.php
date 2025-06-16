<?php

namespace App\Models;

use CodeIgniter\Model;

class TempatModel extends Model
{
    protected $table = 'tempat';
    protected $primaryKey = 'ID_tempat';
    protected $useTimestamps    = false;

    protected $allowedFields    = [
        'nama_tempat',
        'kabupaten_kota',
        'kecamatan',
        'kelurahan',
        'nama_jalan',
        'kategori',
        'deskripsi',
        'foto',
        'google_maps'
    ];
     public function getTempatLengkap()
    {
        $builder = $this->db->table($this->table);

        $builder->join('tempat_wisata', 'tempat.ID_tempat = tempat_wisata.ID_tempat', 'left');

        $builder->join('tempat_kuliner', 'tempat.ID_tempat = tempat_kuliner.ID_tempat', 'left');
        
        $builder->select('tempat.*, tempat_wisata.harga_tiket, tempat_kuliner.ID_akun as ID_pemilik');

        $query = $builder->get();
        return $query->getResultArray();
    }

    public function findTempatLengkap($id)
    {
        $builder = $this->db->table($this->table);
        $builder->join('tempat_wisata', 'tempat.ID_tempat = tempat_wisata.ID_tempat', 'left');
        $builder->join('tempat_kuliner', 'tempat.ID_tempat = tempat_kuliner.ID_tempat', 'left');
        $builder->select('tempat.*, tempat_wisata.harga_tiket, tempat_kuliner.ID_akun as ID_pemilik');

        $builder->where('tempat.ID_tempat', $id);

        $query = $builder->get();
        return $query->getRowArray();
    }
}
