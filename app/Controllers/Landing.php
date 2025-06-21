<?php

namespace App\Controllers;

use App\Models\TempatModel;
use App\Models\ReviewModel; // Perlu di-import
use App\Models\MenuModel;   // Perlu di-import
use App\Models\PromoModel;  // Perlu di-import
use CodeIgniter\Controller; // Diperlukan jika Anda menggunakan BaseController

class Landing extends BaseController
{
    protected $helpers = ['url', 'session']; // Tambahkan session helper

    public function landingPage()
    {
        $tempatModel = new TempatModel();
        $reviewModel = new ReviewModel(); // Instansiasi model
        $menuModel = new MenuModel();     // Instansiasi model
        $promoModel = new PromoModel();   // Instansiasi model

        $data = [
            'title'              => 'Lombok Recommendation',
            // 'js' => 'Landing.js' // Jika Anda punya JS khusus LandingPage, bisa di sini. Tapi di solusi sebelumnya JS di LandingPage.php langsung
            'show_detail_tempat' => false, // Default: jangan tampilkan detail
            'tempat'             => null,
            'reviews'            => null,
            'menu'               => null,
            'promo'              => null,
            'isOwner'            => false,
            'isLoggedIn'         => session()->get('isLoggedIn') ?? false, // Status login dari sesi
        ];

        // Cek apakah ada permintaan untuk menampilkan detail tempat di URL ini
        $showDetail = $this->request->getGet('show');
        $idTempat = $this->request->getGet('id');

        if ($showDetail === 'detail' && !empty($idTempat)) {
            $tempat = $tempatModel
                        ->select('tempat.*, AVG(review.rating) as average_rating')
                        ->join('review', 'review.ID_tempat = tempat.ID_tempat', 'left')
                        ->where('tempat.ID_tempat', $idTempat)
                        ->groupBy('tempat.ID_tempat')
                        ->first();

            if ($tempat) {
                $data['show_detail_tempat'] = true;
                $data['tempat'] = $tempat;
                $data['reviews'] = $reviewModel->getReviewsWithUser(2);
                if ($tempat['kategori'] === 'culinary') {
                    $data['menu'] = $menuModel->where('ID_tempat', $idTempat)->findAll();
                    $data['promo'] = $promoModel->where('ID_tempat', $idTempat)->findAll();
                }
                if ($data['isLoggedIn'] && session()->get('ID_akun') === $tempat['ID_akun']) {
                    $data['isOwner'] = true;
                }
            } else {
                return redirect()->to(base_url('landing'))->with('error', 'Detail tempat tidak ditemukan.');
            }
        } else {
            // Logika untuk tampilan landing page default (yang menampilkan hero, about, dll.)
            // Jika tidak dalam mode detail, ini akan menyiapkan data untuk halaman awal standar.
            // Parameter seperti searchTerm, category, pager tidak relevan untuk LandingPage standar.
            // Jika Anda ingin menampilkan kartu destinasi di landing page, logika di bawah ini perlu diaktifkan kembali.
            // Namun, untuk solusi terakhir, LandingPage hanya menampilkan hero/about/footer default.
            
            // Contoh jika ingin menampilkan kartu juga di landing page:
            $searchTerm = $this->request->getVar('search');
            $category = $this->request->getVar('category');
            $page = $this->request->getVar('page') ?? 1;

            $options = [
                'searchTerm' => $searchTerm,
                'category'   => $category,
                'page'       => $page,
            ];

            $perPage = 9;
            $result = $tempatModel->getTempat($options, $perPage);
            $data['destinasi'] = $result['data'];
            $data['js'] = 'Landing.js'; // Jika Anda punya JS khusus untuk LandingPage
            $data['pager'] = $tempatModel->pager;
            $data['current_search_term'] = $searchTerm;
            $data['active_category'] = $category;
            $data['current_query'] = $this->request->getGet();
            $data['path'] = site_url(''); // Path untuk link filter/search di landing page
            $data['categories'] = [ // Categories juga perlu jika ada filter/search
                'tourist_destination' => [
                    'label' => 'Tourist destination',
                    'icon'  => 'fa-solid fa-location-dot'
                ],
                'culinary' => [
                    'label' => 'Culinary',
                    'icon'  => 'fa-solid fa-utensils'
                ]
            ];
        }

        return view('pages/LandingPage', $data);
    }
}