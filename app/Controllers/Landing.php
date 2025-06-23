<?php

namespace App\Controllers;

use App\Models\TempatModel;
use App\Models\ReviewModel; 
use App\Models\MenuModel;
use App\Models\PromoModel;  
use CodeIgniter\Controller; 

class Landing extends BaseController
{
    protected $helpers = ['url', 'session']; 

    public function landingPage()
    {
        $tempatModel = new TempatModel();
        $reviewModel = new ReviewModel(); 
        $menuModel = new MenuModel();     
        $promoModel = new PromoModel();   

        $data = [
            'title'              => 'Lombok Recommendation',
            'show_detail_tempat' => false, 
            'tempat'             => null,
            'reviews'            => null,
            'menu'               => null,
            'promo'              => null,
            'isOwner'            => false,
            'isLoggedIn'         => session()->get('isLoggedIn') ?? false, 
        ];

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
                $data['reviews'] = $reviewModel->getReviewsWithUser($idTempat);
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
            $data['pager'] = $tempatModel->pager;
            $data['current_search_term'] = $searchTerm;
            $data['active_category'] = $category;
            $data['current_query'] = $this->request->getGet();
        }
        $data['js'] = 'Landing.js'; 
        $data['path'] = site_url(''); 
        $data['categories'] = [ 
            'tourist_destination' => [
                'label' => 'Tourist destination',
                'icon'  => 'fa-solid fa-location-dot'
            ],
            'culinary' => [
                'label' => 'Culinary',
                'icon'  => 'fa-solid fa-utensils'
            ]
        ];
        
        return view('pages/LandingPage', $data);
    }
}