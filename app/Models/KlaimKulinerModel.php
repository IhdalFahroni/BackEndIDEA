<?php

namespace App\Models;

use CodeIgniter\Model;

class KlaimKulinerModel extends Model
{
    protected $table         = 'form_klaim'; 
    protected $primaryKey    = 'ID_formKlaim';
    protected $useTimestamps = false;
    protected $allowedFields = [
        'ID_akun', 'ID_tempat', 'nama_lengkap', 'no_hp', 'npwp', 'email',
        'dokumen_pendukung', 'is_verified'
    ];
    public function getPendingVerifications()
    {
        // Pilih kolom yang kita butuhkan untuk halaman verifikasi.
        // Gunakan 'as' untuk membuat alias agar mudah digunakan di controller.
        $this->select(
            'form_pengajuantempat.ID_formPengajuanTempat as id,
             form_pengajuantempat.nama_tempat,
             akun.username as user,
             akun.email as email'
        );

        // Gabungkan dengan tabel 'akun' untuk mendapatkan detail user.
        // Asumsi foreign key adalah 'ID_akun'. 'left' join lebih aman.
        $this->join('akun', 'akun.ID_akun = form_pengajuantempat.ID_akun', 'left');

        // Ini bagian paling penting: Filter hanya untuk pengajuan yang masih pending.
        // !! PENTING: Sesuaikan 'status_verifikasi' dan 'pending' dengan nama kolom & value di tabel Anda !!
        $this->where('form_pengajuantempat.status_verifikasi', 'pending');

        // Urutkan data berdasarkan pengajuan terbaru
        $this->orderBy('form_pengajuantempat.ID_formPengajuanTempat', 'DESC');

        return $this->findAll();
    }
}