<?php

namespace App\Controllers;

use App\Models\AkunModel; // Pastikan AkunModel sudah di-import

class Login extends BaseController
{
    protected $helpers = ['url', 'form', 'session'];
    public function login(): string
    {
        $data['title'] = 'Login | LombokRec';
        return view('pages/LoginPage'); // Pastikan Anda memiliki view LoginPage.php
    }

    public function process()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $akunModel = new AkunModel();

        // Method loginAkun di AkunModel harus mengembalikan array user lengkap
        // termasuk 'is_pemilik' dan 'is_admin' jika autentikasi berhasil,
        // atau null/false jika gagal.
        $user = $akunModel->loginAkun([
            'username' => $username,
            'password' => $password
        ]);

        if ($user) {
            $session = session();
            
            // Tentukan peran pengguna berdasarkan flag is_pemilik dan is_admin
            $userRole = 'user'; // Default role
            if (isset($user['is_admin']) && $user['is_admin'] == 1) {
                $userRole = 'admin';
            } elseif (isset($user['is_pemilik']) && $user['is_pemilik'] == 1) {
                $userRole = 'pemilik';
            }

            // Data yang akan disimpan di session
            $sessionData = [
                'ID_akun'      => $user['ID_akun'],
                'nama_depan'   => $user['nama_depan'],
                'nama_belakang'=> $user['nama_belakang'],
                'username'     => $user['username'],
                'isLoggedIn'   => TRUE,
                'user_role'    => $userRole, // Simpan peran sebagai string
                'email'        => $user['email'], 
                'foto'         => $user['foto_profil'] ?? null, // Pastikan foto ada, jika tidak set null
            ];
            
            // Hapus flag is_pemilik dan is_admin yang mungkin tidak konsisten
            // jika Anda hanya akan menggunakan user_role
            // unset($user['is_pemilik']);
            // unset($user['is_admin']);

            $session->set($sessionData);

            // Arahkan ke satu URL dashboard umum
            return redirect()->to(base_url('home')); // Akan ditangani oleh Home::index()

        } else {
            // Jika login gagal, kembalikan ke halaman login dengan pesan error
            return redirect()->to(base_url('login'))->with('error', 'Username atau Password salah.');
        }
    }
    // Anda mungkin juga ingin menambahkan fungsi logout
    public function logout()
    {
        $session = session();
        $session->destroy(); // Hapus semua data sesi
        return redirect()->to(base_url('login'))->with('success', 'Anda telah berhasil logout.');
    }
}