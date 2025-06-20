<?php
namespace App\Models;
use CodeIgniter\Model;
class PromoModel extends Model {
    protected $table = 'promo'; // Sesuaikan nama tabel Anda
    protected $primaryKey = 'ID_promo';
    protected $allowedFields = ['ID_tempat', 'nama_promo', 'deskripsi_promo', 'tanggal_mulai', 'tanggal_akhir'];
}