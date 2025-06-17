<?php

namespace App\Controllers;

use App\Models\TempatModel;

class Landing extends BaseController
{
    public function landingPage() // Hapus tipe data 'void' karena kita akan mengembalikan view
    {
        // 1. Buat instance dari TempatModel
        $tempatModel = new TempatModel();

        // 2. Siapkan opsi untuk pagination. Ambil halaman saat ini dari URL (?page=...)
        // Jika tidak ada, default ke halaman 1.
        $options = [
            'page' => $this->request->getVar('page') ?? 1,
            // 'searchTerm' => $this->request->getVar('q'), // Untuk pencarian nanti
            // 'category'   => $this->request->getVar('kategori') // Untuk filter nanti
        ];
        
        // Tentukan berapa item yang ingin ditampilkan per halaman
        $perPage = 9;

        // 3. Panggil method getTempat() dari Model dengan opsi yang sudah disiapkan
        $result = $tempatModel->getTempat($options, $perPage);

        // 4. Siapkan data yang akan dikirim ke view
        $data = [
            'destinasi'   => $result['data'],
            'pager'       => $tempatModel->pager, // Kirim Pager untuk link halaman
            'currentPage' => $options['page'],
            'perPage'     => $perPage,
            'total'       => $result['total']
        ];

        // 5. Tampilkan view-view parsial dan kirimkan data ke view 'main'
        echo view('partials/header');
        echo view('partials/opening');
        echo view('partials/main', $data); // <-- KIRIMKAN $data KE VIEW MAIN
        echo view('partials/footer');
    }
}