<?php

namespace App\Controllers;

use App\Models\AkunModel;

class SignUp extends BaseController
{
    public function signup(): string
    {
        return view('pages/SignUpPage');
    }
    // Fungsi ini untuk memproses data dari form signup
    public function process()
    {
        // Ambil data dari form yang dikirim dengan metode POST
        $data = [
            'username' => $this->request->getPost('username'),
            'email'        => $this->request->getPost('email'),
            'password'     => $this->request->getPost('password'),
            'nama_depan'     => $this->request->getPost('nama_depan'),
            'nama_belakang'     => $this->request->getPost('nama_belakang'),
        ];

        // Buat instance dari model
        $akunModel = new AkunModel();

        // Panggil metode registerAkun() yang sudah kita buat di model
        $success = $akunModel->registerAkun($data);

        if ($success) {
            // Jika pendaftaran berhasil (return true)
            // Arahkan ke halaman login dengan pesan sukses
             return redirect()->back()->with('signup_success', 'Pendaftaran berhasil! Anda akan diarahkan ke halaman login...');
        } else {
            // Jika pendaftaran gagal (email sudah ada / return false)
            // Kembalikan ke halaman signup dengan pesan error
            return redirect()->back()->withInput()->with('error', 'Email sudah terdaftar. Silakan gunakan email lain.');
        }
    }
}
