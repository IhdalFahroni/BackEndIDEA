<?php

namespace App\Controllers;

use App\Models\AkunModel;

class Login extends BaseController
{
    protected $helpers = ['url', 'form', 'session'];
    public function login(): string
    {
        $data['title'] = 'Login | LombokRec';
        return view('pages/LoginPage');
    }

    public function process()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $akunModel = new AkunModel();

        $user = $akunModel->loginAkun([
            'username' => $username,
            'password' => $password
        ]);

        if ($user) {
            $session = session();
            
            $userRole = 'user'; 
            if (isset($user['is_admin']) && $user['is_admin'] == 1) {
                $userRole = 'admin';
            } elseif (isset($user['is_pemilik']) && $user['is_pemilik'] == 1) {
                $userRole = 'pemilik';
            }

            $sessionData = [
                'ID_akun'      => $user['ID_akun'],
                'nama_depan'   => $user['nama_depan'],
                'nama_belakang'=> $user['nama_belakang'],
                'username'     => $user['username'],
                'isLoggedIn'   => TRUE,
                'user_role'    => $userRole, 
                'email'        => $user['email'], 
                'foto'         => $user['foto_profil'] ?? null, 
            ];
            

            $session->set($sessionData);

            return redirect()->to(base_url('home')); 

        } else {
            return redirect()->to(base_url('login'))->with('error', 'Username atau Password salah.');
        }
    }
    public function logout()
    {
        $session = session();
        $session->destroy(); 
        return redirect()->to(base_url('login'))->with('success', 'Anda telah berhasil logout.');
    }
}