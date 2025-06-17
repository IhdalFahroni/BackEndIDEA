<?php

namespace App\Controllers;

use App\Models\AkunModel;

class Login extends BaseController
{
    public function login(): string
    {
        return view('LoginPage');
    }
    public function process()
    {
        $data = [
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
        ];

        $akunModel = new AkunModel();

        $user = $akunModel->loginAkun($data);

        if($user) {
            $session = session();

            $sessionData = [
                'nama_depan'  => $user['nama_depan'],
                'nama_belakang'  => $user['nama_belakang'],
                'username'      => $user['username'],
                'isLoggedIn'    => TRUE,
                'is_pemilik'    => $user['is_pemilik'],
                'is_admin'    => $user['is_admin']
            ];
            $session->set($sessionData);

            if ($user['is_pemilik'] == 1) {
                return redirect()->to('/homepemilik');
            } elseif ($user['is_admin'] == 1) {
                return redirect()->to('/homeadmin');
            } else {
                return redirect()->to('/homeuser');
            }

        } else {
            return redirect()->to('/login')->with('error', 'Username atau Password salah.');
        }
    }
}
