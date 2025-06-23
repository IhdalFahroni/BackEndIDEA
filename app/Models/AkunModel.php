<?php

namespace App\Models;

use CodeIgniter\Model;

class AkunModel extends Model
{
    protected $table = 'akun'; // Nama tabel Anda
    protected $primaryKey = 'ID_akun'; // Primary key tabel Anda

    // Kolom yang boleh diisi. WAJIB diisi untuk keamanan.
    protected $allowedFields = ['username', 'foto_profil', 'password', 'email', 'nama_depan', 'nama_belakang', 'is_pemilik', 'is_admin'];

    public function registerAkun(array $data): bool
    {
        $existingAkun = $this->where('email', $data['email'])->first();

        if ($existingAkun) {
            return false;
        }

        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        $this->insert($data);

        return true;
    }

    public function loginAkun(array $data)
    {
        $user = $this->where('username', $data['username'])->first();

        if (!$user) {
            return false;
        }

        $formPassword = $data['password'];
        $hashedPassword = $user['password'];

        if(password_verify($formPassword, $hashedPassword)) {
            return $user;
        }

        return false;
    }
       public function updateProfile(int $id, array $data)
    {
        return $this->update($id, $data);
    }

    public function deleteAkun(int $id)
    {
        return $this->delete($id);
    }
}