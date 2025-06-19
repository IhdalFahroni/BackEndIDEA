<?php

namespace App\Controllers;

use App\Models\TempatModel;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface; // Tambahkan ini jika BaseController tidak meng-extend Controller
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

class Home extends BaseController // Ubah ke Home atau Dashboard sesuai nama controller Anda
{
    // Pastikan Anda memuat helper 'session' jika belum dimuat secara global
    // protected $helpers = ['url', 'form', 'session']; // Tambahkan 'session' jika belum

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        helper('session');
        helper('url'); // <--- PASTIKAN INI ADA DAN TIDAK DIKOMENTARI
    }

    public function index() // Ini akan menjadi method utama untuk dashboard
    {
        $session = session();
        $userRole = $session->get('user_role'); // Pastikan ini mengambil role dari session Anda
        
        // --- Untuk Debugging Saja ---
        // if (!$userRole) {
        //     // Simulasikan role jika belum ada di session (HAPUS DI PRODUKSI)
        //     $userRole = 'user'; // Atau 'pemilik', 'admin' untuk testing
        //     $session->set('user_role', $userRole);
        // }
        // --- Akhir Debugging ---

        if (!$userRole) {
            // Redirect ke halaman login jika user_role tidak ditemukan di session
            return redirect()->to(base_url('login'))->with('error', 'Anda harus login untuk mengakses halaman ini.');
        }

        $tempatModel = new TempatModel();
        $searchTerm = $this->request->getVar('search');
        $category = $this->request->getVar('category');
        $page = $this->request->getVar('page') ?? 1;
        $perPage = 9;

        // Ambil data destinasi hanya jika role memungkinkan dan diperlukan
        $destinasi = [];
        $pager = null;
        if ($userRole === 'user' || $userRole === 'pemilik' || $userRole === 'admin') {
            $options = [
                'searchTerm' => $searchTerm,
                'category'   => $category,
                'page'       => $page,
            ];
            $result = $tempatModel->getTempat($options, $perPage);
            $destinasi = $result['data'];
            $pager = $tempatModel->pager;
        }

        $data = [
            'title'       => ucfirst($userRole) . ' HomePage | LombokRec', // Title dinamis
            'js_file'     => 'home.js', // Asumsikan Anda memiliki satu JS file gabungan ini
            'user_role'   => $userRole, // Kirim role ke view
            'destinasi'   => $destinasi, // Data destinasi
            'pager'       => $pager, // Objek Pager
            'current_search_term' => $searchTerm,
            'active_category'     => $category,
            'current_query'       => $this->request->getGet(),
            'categories' => [
                'tourist_destination' => [
                    'label' => 'Tourist destination',
                    'icon'  => 'fa-solid fa-location-dot'
                ],
                'culinary' => [
                    'label' => 'Culinary',
                    'icon'  => 'fa-solid fa-utensils'
                ],
            'path' => site_url('home'),
            ],
            // Anda bisa tambahkan data spesifik role di sini jika diperlukan
            // 'admin_data' => $adminModel->getAdminSpecificData(),
        ];

        return view('pages/Home', $data);
    }
}