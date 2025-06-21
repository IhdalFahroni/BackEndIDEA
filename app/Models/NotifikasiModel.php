<?php

namespace App\Models;

use CodeIgniter\Model;

class NotifikasiModel extends Model
{
    protected $table = 'notifikasi'; // Nama tabel Anda
    protected $primaryKey = 'ID_notif'; // Primary key tabel Anda
    protected $useTimestamps = true;

    // Kolom yang boleh diisi. WAJIB diisi untuk keamanan.
    protected $allowedFields = ['ID_akun', 'header', 'isi_notif', 'tanggal_jam'];
}