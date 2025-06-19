<?php

namespace App\Controllers;

use App\Models\FormKlaimModel;

class KulinerUser extends BaseController
{
    public function kulineruser(): string
    {
        return view('detailTempatKulinerUser');
    }

    public function klaimTempat()
    {
        $data = [
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'no_hp' => $this->request->getPost('no_hp'),
            'email'        => $this->request->getPost('email'),
            'npwp'     => $this->request->getPost('npwp'),
        ];
        // $data['ID_akun'] = session()->get('ID_akun');

        $file = $this->request->getFile('dokumen_pendukung');

        if ($file && $file->isValid() && !$file->hasMoved()) {
            
            $newName = $file->getRandomName();
            
            $file->move(WRITEPATH . 'uploads', $newName);

            $data['dokumen_pendukung'] = $newName;

        } else {
            $data['dokumen_pendukung'] = null;
        }

        dd($data);

        $formKlaimModel = new FormKlaimModel();

        $success = $formKlaimModel->addFormKlaim($data);

         if ($success) {
            return redirect()->back()->with('success', 'Formulir klaim berhasil dikirim!');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal mengirim formulir. Silakan coba lagi.');
        }
    }
}
