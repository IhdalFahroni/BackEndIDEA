<?php

namespace App\Controllers;

use App\Models\TempatModel;
use App\Models\PengajuanTempatModel;
use App\Models\NotifikasiModel;
use App\Models\AkunModel;
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
            'session'    => $session 
        ];

        // Cek apakah permintaan untuk menampilkan detail tempat
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
            'harga_tiket'   => 'required|is_natural',
            'file_upload'   => 'if_exist|uploaded[file_upload]|max_size[file_upload,2048]|ext_in[file_upload,jpg,jpeg,png,gif]',
        ];

        if (!$this->validate($rules)) {
            dd($this->validator->getErrors());
            // Kembali ke halaman sebelumnya dengan input dan error
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors())->with('active_panel', 'addPlace'); // Flash 'active_panel' agar form tetap terbuka
        }

        $tempatModel = new TempatModel();
        $pengajuanTempatModel = new PengajuanTempatModel();
        $uploadedFiles = $this->request->getFiles();
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
            'google_maps'          => $this->request->getPost('gmaps'),
            'deskripsi'     => $this->request->getPost('description'),
            'harga_tiket'   => $this->request->getPost('harga_tiket'),
            'foto'          => !empty($fotoFileNames) ? implode(',', $fotoFileNames) : null,
        ];

        if ($session->get('user_role') === 'admin') {
            if ($tempatModel->insert($dataToInsert)) {
                return redirect()->to(base_url('home'))->with('success', 'Tempat baru berhasil ditambahkan oleh admin.');
            } else {
                return redirect()->back()->withInput()->with('error', 'Gagal menambahkan tempat ke database.')->with('errors', $tempatModel->errors());
            }

        } else { 
            $dataToInsert['ID_akun'] = $session->get('ID_akun'); // Mengambil ID user yang login
            $username = $session->get('username'); // Mengambil username user yang login

            if ($pengajuanTempatModel->insert($dataToInsert)) {
                
                $notifModel = new NotifikasiModel();

                // 2. Siapkan data untuk notifikasi
                $notifToInsert = [
                    'ID_akun'   => 1,
                    'header'    => 'Request for new place addition',
                    'isi_notif' => "$username has submitted a request to add a new place.",
                ];

                // 3. Masukkan notifikasi ke database
                $notifModel->insert($notifToInsert);
                
                return redirect()->to(base_url('home'))->with('success', 'Tempat berhasil diajukan dan sedang menunggu verifikasi dari admin.');

            } else {
                return redirect()->back()->withInput()->with('error', 'Gagal mengajukan tempat baru.')->with('errors', $pengajuanTempatModel->errors());
            }
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
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $akunModel = new AkunModel();
        $akunId = $session->get('ID_akun');
        $user = $akunModel->find($akunId);

        if (!$user || !password_verify($this->request->getPost('current_password'), $user['password'])) {
            return redirect()->back()->with('error', 'Password lama yang Anda masukkan salah.');
        }
        $dataToUpdate = [
            'password' => password_hash($this->request->getPost('new_password'), PASSWORD_DEFAULT)
        ];

        if ($akunModel->update($akunId, $dataToUpdate)) {
            return redirect()->to(base_url('home'))->with('success', 'Password berhasil diubah.');
        } else {
            return redirect()->back()->with('error', 'Gagal mengubah password di database.');
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

       public function submitReview()
    {
        $session = session();
        if (!$session->get('isLoggedIn')) {
            return redirect()->to(base_url('login'))->with('error', 'Anda harus login untuk mengirim ulasan.');
        }

        // Aturan validasi yang sudah diperbaiki
        $rules = [
            'ID_tempat' => 'required|integer',
            // Memperbolehkan angka desimal, bukan hanya integer
            'rating'    => 'required|numeric|greater_than_equal_to[1]|less_than_equal_to[5]',
            'komentar'  => 'permit_empty|max_length[500]',
            // Validasi untuk foto (opsional, maks 2MB, hanya gambar)
            'review_photo' => 'permit_empty|is_image[review_photo]|max_size[review_photo,2048]|ext_in[review_photo,png,jpg,jpeg]',
        ];

        if (!$this->validate($rules)) {
            $idTempat = $this->request->getPost('ID_tempat');
            return redirect()->to(base_url("home?show=detail&id={$idTempat}"))->withInput()->with('errors', $this->validator->getErrors());
        }

        // --- LOGIKA UPLOAD GAMBAR ---
        $reviewPhotoName = null;
        $reviewPhoto = $this->request->getFile('review_photo');

        // Cek jika ada file valid yang diupload dan belum dipindahkan
        if ($reviewPhoto && $reviewPhoto->isValid() && !$reviewPhoto->hasMoved()) {
            // Buat nama acak untuk file agar tidak bentrok
            $reviewPhotoName = $reviewPhoto->getRandomName();
            // Pindahkan file ke folder tujuan
            $reviewPhoto->move(ROOTPATH . 'public/Assets/', $reviewPhotoName);
        }
        // --- AKHIR LOGIKA UPLOAD GAMBAR ---

        $reviewModel = new ReviewModel();
        $dataToInsert = [
            'ID_tempat' => $this->request->getPost('ID_tempat'),
            'ID_akun'   => $session->get('ID_akun'),
            'rating'    => $this->request->getPost('rating'),
            'komentar'  => $this->request->getPost('komentar'),
            // Simpan nama file ke database (null jika tidak ada foto)
            'foto' => $reviewPhotoName,
        ];

        // PENTING: Pastikan 'foto_review' sudah ada di $allowedFields pada ReviewModel.php
        
        if ($reviewModel->insert($dataToInsert)) {
            $idTempat = $dataToInsert['ID_tempat'];
            return redirect()->to(base_url("home?show=detail&id={$idTempat}"))->with('success', 'Ulasan Anda berhasil dikirim.');
        } else {
            $idTempat = $dataToInsert['ID_tempat'];
            return redirect()->to(base_url("home?show=detail&id={$idTempat}"))->with('error', 'Gagal menyimpan ulasan ke database.');
        }
    }
}