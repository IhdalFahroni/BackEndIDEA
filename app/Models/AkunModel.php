<?php

namespace App\Models;

use CodeIgniter\Model;

class AkunModel extends Model
{
    protected $table = 'akun'; // Nama tabel Anda
    protected $primaryKey = 'ID_akun'; // Primary key tabel Anda

    // Kolom yang boleh diisi. WAJIB diisi untuk keamanan.
    protected $allowedFields = ['username', 'foto_profil', 'password', 'email', 'nama_depan', 'nama_belakang', 'is_pemilik', 'is_admin'];

    /**
     * Fungsi untuk mendaftarkan akun baru.
     * @param array $data Data akun dari form (nama, email, password).
     * @return bool True jika berhasil, False jika email sudah ada.
     */
    public function registerAkun(array $data): bool
    {
        // 1. Cek apakah email sudah ada di database
        // $this->where('kolom', 'nilai')->first(); artinya "cari baris pertama yang cocok"
        $existingAkun = $this->where('email', $data['email'])->first();

        if ($existingAkun) {
            // Jika $existingAkun tidak null, berarti email sudah ada.
            // Pendaftaran gagal, kembalikan false.
            return false;
        }

        // 2. Jika email belum ada, hash password sebelum disimpan.
        // INI WAJIB! JANGAN PERNAH SIMPAN PASSWORD DALAM BENTUK TEKS BIASA.
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        // 3. Masukkan data ke dalam database menggunakan fungsi insert() bawaan Model.
        $this->insert($data);

        // Jika berhasil sampai sini, pendaftaran sukses. Kembalikan true.
        return true;
    }
}