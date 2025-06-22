<?php

namespace App\Controllers;

use App\Models\TempatModel;
use App\Models\PengajuanTempatModel;
use App\Models\NotifikasiModel;
use App\Models\ReviewModel; // <--- PASTIKAN BARIS INI ADA
use App\Models\MenuModel;   // <--- PASTIKAN BARIS INI ADA
use App\Models\PromoModel;  // <--- PASTIKAN BARIS INI ADA
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

class Home extends BaseController
{
    // Memuat helper yang diperlukan secara global untuk controller ini
    protected $helpers = ['url', 'form', 'session', 'filesystem'];

    // Inisialisasi controller, pastikan helper session dimuat
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        // Pastikan Anda memiliki filter 'login' yang mengarahkan pengguna ke login jika belum isLoggedIn
        // Contoh: public $filters = ['before' => ['auth']]; dan define filter 'auth' di Config/Filters.php
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

        $id_akun = $session->get('ID_akun');
        $addPlaceForm = $pengajuanTempatModel->getAddPlaceForm();
        $verificationItems = [];
        if (!empty($addPlaceForm)) {
            foreach ($addPlaceForm as $item) {
                $item['type'] = 'addPlace';
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
            // Variabel untuk menentukan tampilan konten utama
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

        // Cek apakah permintaan untuk menampilkan detail tempat
        

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
                $data['reviews'] = $reviewModel->getReviewsWithUser($idTempat); // Pastikan method ini ada di ReviewModel

                if ($tempat['kategori'] === 'culinary') {
                    $data['menu'] = $menuModel->where('ID_tempat', $idTempat)->findAll();
                    $data['promo'] = $promoModel->where('ID_tempat', $idTempat)->findAll();
                }

                if ($session->get('isLoggedIn') && $session->get('ID_akun') === $tempat['ID_akun']) {
                    $data['isOwner'] = true;
                }
            } else {
                // Jika ID tempat tidak ditemukan, redirect kembali ke home
                return redirect()->to(base_url('home'))->with('error', 'Detail tempat tidak ditemukan.');
            }
        } else {
            // Logika untuk tampilan dashboard utama (main_content_user)
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

        return view('pages/home', $data); // Render pages/home.php
    }

    // --- ENDPOINTS UNTUK FORM SUBMISSION (FULL PAGE RELOAD) ---

    // Method untuk submit form "Add Place"
    

    // Method untuk update profil
    

    // Method untuk change password
    

    // Method untuk delete akun


    // Method untuk verifikasi (Admin only)
    



}