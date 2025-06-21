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
        $session = session();
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
            'title'     => esc($tempat['nama_tempat']) . ' | LombokRec',
            'js_file'   => 'dashboard.js', // Gunakan dashboard.js
            'tempat'    => $tempat,
            'reviews'   => $reviews,
            'menu'      => $menu,
            'promo'     => $promo,
            'isOwner'   => $isOwner,
            'user_role' => $session->get('user_role'),
            'isLoggedIn' => $session->get('isLoggedIn'),
            'show_detail_tempat' => true // Tambahkan variabel ini
        ];

        return view('pages/dashboard', $data); // Render dashboard, bukan tempat_detail
    }
}