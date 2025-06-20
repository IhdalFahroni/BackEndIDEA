<?php

namespace App\Controllers;

use App\Models\TempatModel;
use App\Models\ReviewModel;
use App\Models\MenuModel;
use App\Models\PromoModel;
use CodeIgniter\Controller;

class Tempat extends BaseController
{
    protected $helpers = ['url', 'session'];

    public function detail($id_tempat)
    {
        $session = session(); // Ambil sesi untuk cek login/pemilik
        $tempatModel = new TempatModel();
        $reviewModel = new ReviewModel();

        $tempat = $tempatModel
                    ->select('tempat.*, AVG(review.rating) as average_rating')
                    ->join('review', 'review.ID_tempat = tempat.ID_tempat', 'left')
                    ->where('tempat.ID_tempat', $id_tempat)
                    ->groupBy('tempat.ID_tempat')
                    ->first();

        if (!$tempat) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        // Ambil review (gunakan method yang sudah ada di ReviewModel)
        $reviews = $reviewModel->getReviewsWithUser($id_tempat);

        $menu = null;
        $promo = null;
        if ($tempat['kategori'] === 'culinary') {
            $menuModel = new MenuModel();
            $promoModel = new PromoModel();
            $menu = $menuModel->where('ID_tempat', $id_tempat)->findAll();
            $promo = $promoModel->where('ID_tempat', $id_tempat)->findAll();
        }

        $isOwner = false;
        if ($session->get('isLoggedIn') && $session->get('ID_akun') === $tempat['ID_akun']) {
            $isOwner = true;
        }

        $data = [
            'title'     => esc($tempat['nama_tempat']) . ' | LombokRec', // Title untuk home_template
            'js_file'   => 'tempat_detail.js', // JavaScript khusus halaman ini
            'tempat'    => $tempat, // Data tempat
            'reviews'   => $reviews, // Data review
            'menu'      => $menu, // Data menu
            'promo'     => $promo, // Data promo
            'isOwner'   => $isOwner, // Flag apakah user adalah pemilik tempat
            'user_role' => $session->get('user_role') // Kirim user_role untuk kondisi sidebar/lainnya di template
        ];

        return view('partials/detail_tempat', $data); // Merender tempat_detail.php
    }
}