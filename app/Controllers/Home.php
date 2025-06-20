<?php

namespace App\Controllers;

use App\Models\TempatModel;
use App\Models\AkunModel;
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

        // Jika tidak login, arahkan ke halaman login
        if (!$isLoggedIn || !$userRole) {
            return redirect()->to(base_url('login'))->with('error', 'Anda harus login untuk mengakses halaman ini.');
        }

        $tempatModel = new TempatModel();
        $searchTerm = $this->request->getGet('search');
        $category = $this->request->getGet('category');
        $page = $this->request->getGet('page') ?? 1;
        $perPage = 9;

        $destinasi = [];
        $pager = null;
        
        // Ambil data destinasi jika diperlukan oleh dashboard utama
        $options = [
            'searchTerm' => $searchTerm,
            'category'   => $category,
            'page'       => $page,
        ];
        $result = $tempatModel->getTempat($options, $perPage);
        $destinasi = $result['data'];
        $pager = $tempatModel->pager;
        
        $data = [
            'title'       => ucfirst($userRole) . ' Homepage | LombokRec',
            'js_file'     => 'home.js', // File JS gabungan Anda
            'user_role'   => $userRole,
            'destinasi'   => $destinasi,
            'pager'       => $pager,
            'current_search_term' => $searchTerm,
            'active_category'     => $category,
            'current_query'       => $this->request->getGet(), // Kirim semua query current
            'categories' => [
                'tourist_destination' => [
                    'label' => 'Tourist destination',
                    'icon'  => 'fa-solid fa-location-dot'
                ],
                'culinary' => [
                    'label' => 'Culinary',
                    'icon'  => 'fa-solid fa-utensils'
                ]
            ],
            'path' => site_url('home') // URL dasar untuk filter button
        ];

        return view('pages/home', $data);
    }

    // --- ENDPOINTS UNTUK FORM SUBMISSION (FULL PAGE RELOAD) ---

    // Method untuk submit form "Add Place"
    public function submitAddPlace()
    {
        $session = session();
        if (!$session->get('isLoggedIn')) {
            return redirect()->to(base_url('login'))->with('error', 'Anda harus login untuk menambahkan tempat.');
        }
        if (!in_array($session->get('user_role'), ['user', 'pemilik', 'admin'])) {
            return redirect()->to(base_url('home'))->with('error', 'Anda tidak memiliki izin untuk menambahkan tempat.');
        }

        $rules = [
            'place_name'    => 'required|min_length[3]|max_length[255]',
            'category'      => 'required|in_list[tourist_destination,culinary]',
            'district_city' => 'required',
            'subdistrict'   => 'required',
            'village'       => 'required',
            'street'        => 'required',
            'gmaps'         => 'required|valid_url|regex_match[/^(https?:\/\/(?:www\.|m\.)?google\.(?:com|co\.\w{2}|ru)\/maps\S*|https?:\/\/maps\.app\.goo\.gl\/\S*)/i]',
            'description'   => 'required|min_length[10]',
            'file_upload'   => 'uploaded[file_upload]|max_size[file_upload,2048]|ext_in[file_upload,jpg,jpeg,png,gif]', // name="file_upload[]"
        ];

        if (!$this->validate($rules)) {
            // Kembali ke halaman sebelumnya dengan input dan error
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors())->with('active_panel', 'addPlace'); // Flash 'active_panel' agar form tetap terbuka
        }

        $tempatModel = new TempatModel();
        $uploadedFiles = $this->request->getFiles('file_upload'); // Sesuaikan dengan name="file_upload[]"
        $fotoFileNames = [];

        if ($uploadedFiles) {
            foreach ($uploadedFiles['file_upload'] as $file) {
                if ($file->isValid() && !$file->hasMoved()) {
                    $newName = $file->getRandomName();
                    $file->move(FCPATH . 'Assets', $newName); // Pindahkan ke public/Assets/
                    $fotoFileNames[] = $newName;
                }
            }
        }
        
        $dataToInsert = [
            'nama_tempat'   => $this->request->getPost('place_name'),
            'kategori'      => $this->request->getPost('category'),
            'kabupaten_kota'=> $this->request->getPost('district_city'),
            'kecamatan'     => $this->request->getPost('subdistrict'),
            'kelurahan'     => $this->request->getPost('village'),
            'nama_jalan'    => $this->request->getPost('street'),
            'Maps'          => $this->request->getPost('gmaps'),
            'deskripsi'     => $this->request->getPost('description'),
            'foto'          => !empty($fotoFileNames) ? implode(',', $fotoFileNames) : null,
            'ID_akun'       => $session->get('ID_akun')
        ];

        if ($tempatModel->insert($dataToInsert)) {
            return redirect()->to(base_url('home'))->with('success', 'Tempat berhasil ditambahkan. Menunggu verifikasi admin.')->with('active_panel', 'awal');
        } else {
            return redirect()->back()->with('error', 'Gagal menambahkan tempat ke database.')->with('active_panel', 'addPlace');
        }
    }

    // Method untuk update profil
    public function updateProfile()
    {
        $session = session();
        if (!$session->get('isLoggedIn')) {
            return redirect()->to(base_url('login'))->with('error', 'Anda harus login untuk memperbarui profil.');
        }

        $rules = [
            'username'  => 'required|min_length[8]|max_length[20]',
            'firstName' => 'required|min_length[3]',
            'lastName'  => 'required|min_length[3]',
        ];
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors())->with('active_panel', 'profil');
        }

        $akunModel = new AkunModel();
        $akunId = $session->get('ID_akun');
        $dataToUpdate = [
            'username'     => $this->request->getPost('username'),
            'nama_depan'   => $this->request->getPost('firstName'),
            'nama_belakang'=> $this->request->getPost('lastName'),
        ];

        if ($akunModel->updateProfile($akunId, $dataToUpdate)) {
            // Perbarui data di session juga
            $session->set('username', $dataToUpdate['username']);
            $session->set('nama_depan', $dataToUpdate['nama_depan']);
            $session->set('nama_belakang', $dataToUpdate['nama_belakang']);

            return redirect()->to(base_url('home'))->with('success', 'Profil berhasil diperbarui.')->with('active_panel', 'profil');
        } else {
            return redirect()->back()->with('error', 'Gagal memperbarui profil.')->with('active_panel', 'profil');
        }
    }

    // Method untuk change password
    public function changePassword()
    {
        $session = session();
        if (!$session->get('isLoggedIn')) {
            return redirect()->to(base_url('login'))->with('error', 'Anda harus login untuk mengganti password.');
        }

        $rules = [
            'current_password' => 'required',
            'new_password'     => 'required|min_length[8]|max_length[20]',
        ];
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors())->with('active_panel', 'profil');
        }

        $akunModel = new AkunModel();
        $akunId = $session->get('ID_akun');
        $user = $akunModel->getAkunById($akunId);

        if (!$user || !password_verify($this->request->getPost('current_password'), $user['password'])) {
            return redirect()->back()->with('error', 'Password lama salah.')->with('active_panel', 'profil');
        }

        $hashedNewPassword = password_hash($this->request->getPost('new_password'), PASSWORD_DEFAULT);

        if ($akunModel->changePassword($akunId, $hashedNewPassword)) {
            return redirect()->to(base_url('home'))->with('success', 'Password berhasil diubah.')->with('active_panel', 'profil');
        } else {
            return redirect()->back()->with('error', 'Gagal mengubah password.')->with('active_panel', 'profil');
        }
    }

    // Method untuk delete akun
    public function deleteAccount()
    {
        $session = session();
        if (!$session->get('isLoggedIn')) {
            return redirect()->to(base_url('login'))->with('error', 'Anda harus login untuk menghapus akun.');
        }
        $akunId = $session->get('ID_akun');
        $akunModel = new AkunModel();

        if ($akunModel->deleteAkun($akunId)) {
            $session->destroy(); // Hapus sesi setelah akun dihapus
            return redirect()->to(base_url('login'))->with('success', 'Akun Anda berhasil dihapus.');
        } else {
            return redirect()->back()->with('error', 'Gagal menghapus akun.')->with('active_panel', 'profil');
        }
    }

    // Method untuk verifikasi (Admin only)
    public function verifyRequest()
    {
        $session = session();
        if ($session->get('user_role') !== 'admin') {
            return redirect()->to(base_url('home'))->with('error', 'Hanya admin yang dapat melakukan verifikasi ini.');
        }

        $rules = [
            'request_id'   => 'required|integer',
            'action'       => 'required|in_list[approve,deny]',
            'request_type' => 'required|in_list[add-place,claim-culinary]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->with('error', 'Data verifikasi tidak valid.')->with('active_panel', 'manageVerification');
        }

        $requestId = $this->request->getPost('request_id');
        $action = $this->request->getPost('action');
        $requestType = $this->request->getPost('request_type');

        // --- Lakukan logika database sesuai $requestType dan $action ---
        // Ini adalah tempat Anda akan memperbarui status permintaan di database
        // Misalnya, Anda mungkin memiliki tabel 'verifikasi_requests' atau kolom 'status_verifikasi' di tabel 'tempat'

        // Contoh dummy logic (Anda harus menggantinya dengan logika DB Anda):
        $success = true; // Simulasikan berhasil
        if ($requestType === 'add-place') {
            // Update status tempat menjadi aktif atau tambahkan ke tabel utama
            // Update status permintaan verifikasi (jika ada tabel terpisah)
            // Contoh: $tempatModel->update($requestId, ['status'verifikasi' => $action]);
        } elseif ($requestType === 'claim-culinary') {
            // Update status claim di DB
            // Contoh: $claimModel->update($requestId, ['status' => $action]);
        }

        if ($success) { // Ganti dengan hasil operasi database Anda
            $message = "Permintaan {$requestType} dengan ID {$requestId} berhasil " . ($action === 'approve' ? 'disetujui' : 'ditolak') . ".";
            return redirect()->to(base_url('home'))->with('success', $message)->with('active_panel', 'manageVerification');
        } else {
            return redirect()->back()->with('error', 'Gagal memproses permintaan verifikasi.')->with('active_panel', 'manageVerification');
        }
    }
}