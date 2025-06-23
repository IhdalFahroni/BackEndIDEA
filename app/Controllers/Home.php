<?php

namespace App\Controllers;

use App\Models\KlaimKulinerModel;
use App\Models\TempatModel;
use App\Models\PengajuanTempatModel;
use App\Models\NotifikasiModel;
use App\Models\ReviewModel; 
use App\Models\MenuModel;   
use App\Models\PromoModel;  
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

class Home extends BaseController
{
    protected $helpers = ['url', 'form', 'session', 'filesystem'];

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
    }

    public function index()
    {
        $session = session();
        $userRole = $session->get('user_role');
        $isLoggedIn = $session->get('isLoggedIn');

        if (!$isLoggedIn || !$userRole) {
            return redirect()->to(base_url('login'))->with('error', 'Anda harus login untuk mengakses halaman ini.');
        }

        $tempatModel = new TempatModel();
        $reviewModel = new ReviewModel();
        $menuModel = new MenuModel();
        $promoModel = new PromoModel();
        $notifModel = new NotifikasiModel();
        $pengajuanTempatModel = new PengajuanTempatModel();
        $klaimKulinerModel = new KlaimKulinerModel();

        $id_akun = $session->get('ID_akun');
        $addPlaceForm = $pengajuanTempatModel->getAddPlaceForm();
        $verificationItems = [];
        if (!empty($addPlaceForm)) {
            foreach ($addPlaceForm as $item) {
                $item['type'] = 'addPlace';
                $verificationItems[] = $item;
            }
        }
        $claimForm = $klaimKulinerModel->getClaimForm();
        if (!empty($claimForm)) {
            foreach ($claimForm as $item) {
                $item['type'] = 'claimCulinary';
                $verificationItems[] = $item;
            }
        }

        $showDetail = $this->request->getGet('show');
        $idTempat = $this->request->getGet('id');

        $data = [
            'title'       => ucfirst($userRole) . ' Homepage | LombokRec',
            'js_file'     => 'home.js',
            'user_role'   => $userRole,
            'isLoggedIn'  => $isLoggedIn,
            'path'        => site_url('home'),
            'categories' => [
                'tourist_destination' => ['label' => 'Tourist destination', 'icon'  => 'fa-solid fa-location-dot'],
                'culinary' => ['label' => 'Culinary', 'icon'  => 'fa-solid fa-utensils']
            ],
            'show_detail_tempat' => false,
            'tempat'             => null,
            'reviews'            => null,
            'menu'               => null,
            'promo'              => null,
            'isOwner'            => false,
            'notifikasi' => $notifModel->getNotifikasiByAkun($id_akun),
            'verificationItems' => $verificationItems,
            'session'    => $session,
            'idTempat' => $idTempat
        ];

        $data['owned_places'] = [];
        if ($userRole === 'pemilik') {
            $id_akun_pemilik = $session->get('ID_akun');
            $data['owned_places'] = $tempatModel->where('ID_akun', $id_akun_pemilik)->findAll();
        }
        

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

                if ($session->get('isLoggedIn') && $session->get('ID_akun') === $tempat['ID_akun']) {
                    $data['isOwner'] = true;
                }
            } else {
                return redirect()->to(base_url('home'))->with('error', 'Detail tempat tidak ditemukan.');
            }
        } else {
            $searchTerm = $this->request->getGet('search');
            $category = $this->request->getGet('category');
            $page = $this->request->getGet('page') ?? 1;
            $perPage = 9;

            $options = [
                'searchTerm' => $searchTerm,
                'category'   => $category,
                'page'       => $page,
            ];
            $result = $tempatModel->getTempat($options, $perPage);
            $data['destinasi'] = $result['data'];
            $data['pager'] = $tempatModel->pager;
            $data['current_search_term'] = $searchTerm;
            $data['active_category'] = $category;
            $data['current_query'] = $this->request->getGet();
        }

        return view('pages/home', $data);
    }
}