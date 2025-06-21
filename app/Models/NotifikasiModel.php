<?php

namespace App\Models;

use CodeIgniter\Model;

class NotifikasiModel extends Model
{
    protected $table = 'notifikasi';
    protected $primaryKey = 'ID_notif';

    // Fitur timestamps tetap diaktifkan
    protected $useTimestamps = true; 

    // Arahkan 'created_at' bawaan ke kolom 'tanggal_jam' Anda
    protected $createdField  = 'tanggal_jam';

    // Nonaktifkan 'updated_at' karena Anda tidak memiliki kolomnya
    protected $updatedField  = '';

    // Hapus 'tanggal_jam' dari sini karena akan diisi otomatis oleh useTimestamps
    protected $allowedFields = ['ID_akun', 'header', 'isi_notif'];
}