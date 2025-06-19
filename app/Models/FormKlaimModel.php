<?php

namespace App\Models;

use CodeIgniter\Model;

class FormKlaimModel extends Model
{
    protected $table = 'form_klaim'; // Nama tabel Anda
    protected $primaryKey = 'ID_formKlaim'; // Primary key tabel Anda

    protected $allowedFields = ['nama_lengkap', 'no_hp', 'npwp', 'email', 'dokumen_pendukung'];

    /**
     * Fungsi untuk mendaftarkan akun baru.
     * @param array 
     * @return bool 
     */
    public function addFormKlaim(array $data): bool
    {
        $inserted = $this->insert($data);

        // Jika $inserted tidak false, berarti berhasil. Kembalikan true.
        // Jika $inserted adalah false, berarti gagal. Kembalikan false.
        if ($inserted) {
            return true;
        } else {
            return false;
        }
    }
}