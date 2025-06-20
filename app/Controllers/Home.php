<?php

namespace App\Controllers;

use App\Models\TempatModel;
use App\Models\AkunModel;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface; // Tambahkan ini jika BaseController tidak meng-extend Controller
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

class Home extends BaseController // Ubah ke Home atau Dashboard sesuai nama controller Anda
{
    // Pastikan Anda memuat helper 'session' jika belum dimuat secara global
    // protected $helpers = ['url', 'form', 'session']; // Tambahkan 'session' jika belum
    protected $helpers = ['url', 'form', 'session', 'filesystem'];
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
    }

    public function index() // Ini akan menjadi method utama untuk dashboard
    {
        $session = session();
        $userRole = $session->get('user_role'); // Pastikan ini mengambil role dari session Anda
        $isLoggedIn = $session->get('isLoggedIn');  

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
            'path' => site_url('home'),
            'categories' => [
                'tourist_destination' => [
                    'label' => 'Tourist destination',
                    'icon'  => 'fa-solid fa-location-dot'
                ],
                'culinary' => [
                    'label' => 'Culinary',
                    'icon'  => 'fa-solid fa-utensils'
                ],
            ],
        ];

        return view('pages/Home', $data);
    }

    public function submitAddPlace()
    {
        if (!$this->request->isAJAX()) { // Pastikan hanya menerima request AJAX
            return $this->response->setStatusCode(405)->setJSON(['status' => 'error', 'message' => 'Method Not Allowed']);
        }

        $session = session();
        if (!$session->get('isLoggedIn')) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Anda harus login untuk menambahkan tempat.']);
        }
        // Hanya user, pemilik, atau admin yang bisa add place
        if (!in_array($session->get('user_role'), ['user', 'pemilik', 'admin'])) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Anda tidak memiliki izin untuk menambahkan tempat.']);
        }

        $rules = [
            'place_name'   => 'required|min_length[3]|max_length[255]',
            'category'     => 'required|in_list[tourist_destination,culinary]',
            'district_city'=> 'required',
            'subdistrict'  => 'required',
            'village'      => 'required',
            'street'       => 'required',
            'gmaps'        => 'required|valid_url|regex_match[/^(https?:\/\/(?:www\.|m\.)?google\.(?:com|co\.\w{2}|ru)\/maps\S*|https?:\/\/maps\.app\.goo\.gl\/\S*)/i]',
            'description'  => 'required|min_length[10]',
            'file-upload.*'=> 'if_exist|uploaded[file-upload]|max_size[file-upload,2048]|ext_in[file-upload,jpg,jpeg,png,gif]', // Validasi file
        ];

        if (!$this->validate($rules)) {
            return $this->response->setJSON(['status' => 'error', 'message' => $this->validator->getErrors()]);
        }

        $tempatModel = new TempatModel();
        $uploadedFiles = $this->request->getFiles('file-upload');
        $fotoFileNames = [];

        if ($uploadedFiles) {
            foreach ($uploadedFiles['file-upload'] as $file) {
                if ($file->isValid() && !$file->hasMoved()) {
                    $newName = $file->getRandomName();
                    $file->move(FCPATH . 'Assets', $newName); // Pindahkan ke public/Assets
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
            'foto'          => !empty($fotoFileNames) ? implode(',', $fotoFileNames) : null, // Simpan nama file sebagai string dipisahkan koma
            'ID_akun'       => $session->get('ID_akun') // Simpan ID akun yang menambahkan
        ];

        if ($tempatModel->insert($dataToInsert)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Tempat berhasil ditambahkan. Menunggu verifikasi admin.']);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Gagal menambahkan tempat ke database.']);
        }
    }

    // Contoh: Endpoint untuk update profil (username, nama_depan, nama_belakang)
    public function updateProfile()
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setStatusCode(405)->setJSON(['status' => 'error', 'message' => 'Method Not Allowed']);
        }
        $session = session();
        if (!$session->get('isLoggedIn')) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Anda harus login untuk memperbarui profil.']);
        }

        $rules = [
            'username'   => 'required|min_length[8]|max_length[20]',
            'fullName'   => 'required|min_length[3]',
        ];
        if (!$this->validate($rules)) {
            return $this->response->setJSON(['status' => 'error', 'message' => $this->validator->getErrors()]);
        }

        $akunModel = new AkunModel();
        $akunId = $session->get('ID_akun');
        $dataToUpdate = [
            'username'     => $this->request->getPost('username'),
            'nama_depan'   => $this->request->getPost('fullName'), // Perhatikan nama input di JS
            'nama_belakang'=> $this->request->getPost('lastName') ?? '', // Jika ada lastName
        ];

        if ($akunModel->updateProfile($akunId, $dataToUpdate)) {
            // Perbarui data di session juga
            $session->set($dataToUpdate);
            return $this->response->setJSON(['status' => 'success', 'message' => 'Profil berhasil diperbarui.']);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Gagal memperbarui profil.']);
        }
    }

    // Contoh: Endpoint untuk change password
    public function changePassword()
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setStatusCode(405)->setJSON(['status' => 'error', 'message' => 'Method Not Allowed']);
        }
        $session = session();
        if (!$session->get('isLoggedIn')) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Anda harus login untuk mengganti password.']);
        }

        $rules = [
            'current_password' => 'required',
            'new_password'     => 'required|min_length[8]|max_length[20]',
        ];
        if (!$this->validate($rules)) {
            return $this->response->setJSON(['status' => 'error', 'message' => $this->validator->getErrors()]);
        }

        $akunModel = new AkunModel();
        $akunId = $session->get('ID_akun');
        $user = $akunModel->getAkunById($akunId);

        if (!$user || !password_verify($this->request->getPost('current_password'), $user['password'])) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Password lama salah.']);
        }

        $hashedNewPassword = password_hash($this->request->getPost('new_password'), PASSWORD_DEFAULT);

        if ($akunModel->changePassword($akunId, $hashedNewPassword)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Password berhasil diubah.']);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Gagal mengubah password.']);
        }
    }

    // Contoh: Endpoint untuk delete akun
    public function deleteAccount()
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setStatusCode(405)->setJSON(['status' => 'error', 'message' => 'Method Not Allowed']);
        }
        $session = session();
        if (!$session->get('isLoggedIn')) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Anda harus login untuk menghapus akun.']);
        }
        $akunId = $session->get('ID_akun');
        $akunModel = new AkunModel();

        if ($akunModel->deleteAkun($akunId)) {
            $session->destroy(); // Hapus sesi setelah akun dihapus
            return $this->response->setJSON(['status' => 'success', 'message' => 'Akun Anda berhasil dihapus.']);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Gagal menghapus akun.']);
        }
    }

    // Contoh: Endpoint untuk verifikasi (Admin only)
    public function verifyRequest()
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setStatusCode(405)->setJSON(['status' => 'error', 'message' => 'Method Not Allowed']);
        }
        $session = session();
        if ($session->get('user_role') !== 'admin') {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Hanya admin yang dapat melakukan verifikasi ini.']);
        }

        $requestId = $this->request->getPost('request_id'); // ID dari item verifikasi
        $action = $this->request->getPost('action'); // 'approve' atau 'deny'
        $requestType = $this->request->getPost('request_type'); // 'add-place' atau 'claim-culinary'

        // Lakukan logika database sesuai $requestType dan $action
        // Ini adalah tempat Anda akan memperbarui status permintaan di database
        // Misalnya, Anda mungkin memiliki tabel 'verifikasi_requests' atau kolom 'status_verifikasi' di tabel 'tempat'

        // Contoh dummy logic:
        if ($action === 'approve') {
            // Update status di DB menjadi approved, dan mungkin aktifkan tempat/claim
            $message = "Permintaan {$requestType} dengan ID {$requestId} berhasil disetujui.";
            // Anda akan memanggil model yang sesuai di sini
        } elseif ($action === 'deny') {
            // Update status di DB menjadi denied
            $message = "Permintaan {$requestType} dengan ID {$requestId} berhasil ditolak.";
            // Anda akan memanggil model yang sesuai di sini
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Aksi tidak valid.']);
        }

        return $this->response->setJSON(['status' => 'success', 'message' => $message]);
    }
}