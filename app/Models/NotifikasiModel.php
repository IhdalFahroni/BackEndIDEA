<?php

namespace App\Models;

use CodeIgniter\Model;

class NotifikasiModel extends Model
{
    protected $table = 'notifikasi';
    protected $primaryKey = 'ID_notif';
    protected $useTimestamps = true; 
    protected $createdField  = 'tanggal_jam';
    protected $updatedField  = '';
    protected $allowedFields = ['ID_akun', 'header', 'isi_notif'];

    /**
     * @param int $id_akun ID dari akun yang sedang login.
     * @return array
     */
    public function getNotifikasiByAkun(int $id_akun): array
    {
        return $this->where('ID_akun', $id_akun)
                    ->orderBy('tanggal_jam', 'DESC') // Urutkan dari yang terbaru
                    ->findAll();
    }
}