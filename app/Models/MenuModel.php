<?php
namespace App\Models;
use CodeIgniter\Model;
class MenuModel extends Model {
    protected $table = 'menu'; // Sesuaikan nama tabel Anda
    protected $primaryKey = 'ID_menu';
    protected $allowedFields = ['ID_tempat', 'nama_menu', 'deskripsi_menu', 'harga'];
}