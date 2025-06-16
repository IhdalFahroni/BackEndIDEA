<?php

namespace App\Controllers;

use App\Models\TempatModel;

class Landing extends BaseController
{
    public function landingPage(): string
    {
        // // Buat instance dari TempatModel
        // $tempatModel = new TempatModel();

        // // 1. Untuk mengambil SEMUA data tempat
        // $data['semua_tempat'] = $tempatModel->getTempatLengkap();

        // // 2. Untuk mengambil SATU data tempat (contoh: dengan ID = 1)
        // $id_tempat = 1;
        // $data['satu_tempat'] = $tempatModel->findTempatLengkap($id_tempat);

        // // Tampilkan hasil menggunakan var_dump untuk testing
        // echo "<h2>Semua Tempat:</h2>";
        // var_dump($data['semua_tempat']);

        // echo "<h2>Satu Tempat (ID: {$id_tempat}):</h2>";
        // var_dump($data['satu_tempat']);
        return view('LandingPage');
    }
}