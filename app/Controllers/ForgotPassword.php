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
    $rules = [
        'email' => 'required|valid_email',
        'new_password' => 'required|min_length[8]',
        'confirm_password' => 'required|matches[new_password]'
    ];

    if (!$this->validate($rules)) {
        return redirect()->back()->withInput()->with('errors',  $this->validator->getErrors());
    }

    $email = $this->request->getPost('email');
    $newPassword = $this->request->getPost('new_password');
    $akunModel = new \App\Models\AkunModel();

    $user = $akunModel->where('email', $email)->first();

    if (!$user) {
        return redirect()->back()->withInput()->with('error', 'Email tidak terdaftar di sistem kami.');
    }

    $dataToUpdate = [
        'password' => password_hash($newPassword, PASSWORD_DEFAULT)
    ];

    if ($akunModel->update($user['ID_akun'], $dataToUpdate)) {
        return redirect()->to(base_url('login'))->with('success', 'Password berhasil direset. Silakan login dengan password baru Anda.');
    } else {
        return redirect()->back()->with('error', 'Terjadi kesalahan saat mereset password. Silakan coba lagi.');
    }
}
}
