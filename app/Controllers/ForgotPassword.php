<?php

namespace App\Controllers;

class ForgotPassword extends BaseController
{
    public function forgotpassword(): string
    {
        return view('pages/ForgotPasswordPage');
    }
    
    public function processResetPassword()
{
    // 1. Validasi Server-Side (Sangat Penting!)
    $rules = [
        'email' => 'required|valid_email',
        'new_password' => 'required|min_length[8]',
        'confirm_password' => 'required|matches[new_password]'
    ];

    if (!$this->validate($rules)) {
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    $email = $this->request->getPost('email');
    $newPassword = $this->request->getPost('new_password');
    $akunModel = new \App\Models\AkunModel();

    // 2. Cari akun berdasarkan email
    $user = $akunModel->where('email', $email)->first();

    if (!$user) {
        // Jika email tidak ditemukan, kembali dengan pesan error
        return redirect()->back()->withInput()->with('error', 'Email tidak terdaftar di sistem kami.');
    }

    // 3. Siapkan data untuk di-update
    $dataToUpdate = [
        // HASH PASSWORD BARU! JANGAN PERNAH SIMPAN PLAIN TEXT.
        'password' => password_hash($newPassword, PASSWORD_DEFAULT)
    ];

    // 4. Update password di database
    if ($akunModel->update($user['ID_akun'], $dataToUpdate)) {
        // Jika sukses, arahkan ke halaman login dengan pesan sukses
        return redirect()->to(base_url('login'))->with('success', 'Password berhasil direset. Silakan login dengan password baru Anda.');
    } else {
        // Jika gagal
        return redirect()->back()->with('error', 'Terjadi kesalahan saat mereset password. Silakan coba lagi.');
    }
}
}
