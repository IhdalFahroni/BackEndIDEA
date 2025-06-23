<?php

namespace App\Controllers;

use App\Models\AkunModel;

class SignUp extends BaseController
{
    public function signup(): string
    {
        return view('pages/SignUpPage');
    }
    public function process()
    {
        $data = [
            'username' => $this->request->getPost('username'),
            'email'        => $this->request->getPost('email'),
            'password'     => $this->request->getPost('password'),
            'nama_depan'     => $this->request->getPost('nama_depan'),
            'nama_belakang'     => $this->request->getPost('nama_belakang'),
        ];

        $akunModel = new AkunModel();

        $success = $akunModel->registerAkun($data);

        if ($success) {
             return redirect()->back()->with('signup_success', 'Pendaftaran berhasil! Anda akan diarahkan ke halaman login...');
        } else {
            return redirect()->back()->withInput()->with('error', 'Email sudah terdaftar. Silakan gunakan email lain.');
        }
    }
}
