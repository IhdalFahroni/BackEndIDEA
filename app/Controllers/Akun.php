<?php

namespace App\Controllers;

use App\Models\TempatModel;
use App\Models\PengajuanTempatModel;
use App\Models\KlaimKulinerModel;
use App\Models\NotifikasiModel;
use App\Models\MenuModel;
use App\Models\PromoModel;
use App\Models\ReviewModel;
use App\Models\AkunModel;

class Akun extends BaseController
{
    protected $helpers = ['url', 'form', 'session', 'filesystem'];
    public function updateProfile()
    {
        $session = session();
        if (!$session->get('isLoggedIn')) {
            return redirect()->to(base_url('login'));
        }

        $rules = [
            'username'  => 'required|min_length[8]|max_length[20]',
            'firstName' => 'required|min_length[3]',
            'lastName'  => 'required|min_length[3]',
            'foto_profil' => 'is_image[foto_profil]|max_size[foto_profil,2048]|ext_in[foto_profil,png,jpg,jpeg]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $akunModel = new AkunModel();
        $akunId = $session->get('ID_akun');

        $dataToUpdate = [
            'username'      => $this->request->getPost('username'),
            'nama_depan'    => $this->request->getPost('firstName'),
            'nama_belakang' => $this->request->getPost('lastName'),
            'foto_profil' => $this->request->getPost('foto_profil'),
        ];

        $fotoProfilFile = $this->request->getFile('foto_profil');
        if ($fotoProfilFile && $fotoProfilFile->isValid() && !$fotoProfilFile->hasMoved()) {
        
            $fotoLama = $session->get('foto_profil');
            if ($fotoLama && $fotoLama !== 'default.png' && is_file(FCPATH . 'Assets/profil/' . $fotoLama)) {
                unlink(FCPATH . 'Assets/profil/' . $fotoLama);
            }
            
            $namaFotoBaru = $fotoProfilFile->getRandomName();
            $fotoProfilFile->move(FCPATH . 'Assets/profil', $namaFotoBaru);

            $dataToUpdate['foto_profil'] = $namaFotoBaru;
        }

        if ($akunModel->update($akunId, $dataToUpdate)) {
            $userBaru = $akunModel->find($akunId);
            $session->set($userBaru);

            return redirect()->to(base_url('home?panel=profil'))->with('success', 'Profil berhasil diperbarui.');
        } else {
            return redirect()->back()->with('error', 'Gagal memperbarui profil.');
        }
    }
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
    public function deleteAccount()
    {
        $session = session();
        if (!$session->get('isLoggedIn')) {
            return redirect()->to(base_url('login'))->with('error', 'Anda harus login untuk menghapus akun.');
        }
        $akunId = $session->get('ID_akun');
        $akunModel = new AkunModel();

        if ($akunModel->deleteAkun($akunId)) {
            $session->destroy();
            return redirect()->to(base_url('login'))->with('success', 'Akun Anda berhasil dihapus.');
        } else {
            return redirect()->back()->with('error', 'Gagal menghapus akun.')->with('active_panel', 'profil');
        }
    }
    public function submitReview()
    {
        $session = session();
        if (!$session->get('isLoggedIn')) {
            return redirect()->to(base_url('login'))->with('error', 'Anda harus login untuk mengirim ulasan.');
        }

        $rules = [
            'ID_tempat' => 'required|integer',
            'rating'    => 'required|numeric|greater_than_equal_to[1]|less_than_equal_to[5]',
            'komentar'  => 'permit_empty|max_length[500]',
            'review_photo' => 'permit_empty|is_image[review_photo]|max_size[review_photo,2048]|ext_in[review_photo,png,jpg,jpeg]',
        ];

        if (!$this->validate($rules)) {
            $idTempat = $this->request->getPost('id_tempat');
            return redirect()->to(base_url("home?show=detail&id={$idTempat}"))->withInput()->with('errors', $this->validator->getErrors());
        }

        $reviewPhotoName = null;
        $reviewPhoto = $this->request->getFile('review_photo');

        if ($reviewPhoto && $reviewPhoto->isValid() && !$reviewPhoto->hasMoved()) {
            $reviewPhotoName = $reviewPhoto->getRandomName();
            $reviewPhoto->move(ROOTPATH . 'public/Assets/review_photos', $reviewPhotoName);
        }

        $reviewModel = new ReviewModel();
        $dataToInsert = [
            'ID_tempat' => $this->request->getPost('ID_tempat'),
            'ID_akun'   => $session->get('ID_akun'),
            'rating'    => $this->request->getPost('rating'),
            'komentar'  => $this->request->getPost('komentar'),
            'foto' => $reviewPhotoName,
        ];

        
        if ($reviewModel->insert($dataToInsert)) {
            $idTempat = $dataToInsert['ID_tempat'];
            return redirect()->to(base_url("home?show=detail&id={$idTempat}"))->with('success', 'Ulasan Anda berhasil dikirim.');
        } else {
            $idTempat = $dataToInsert['ID_tempat'];
            return redirect()->to(base_url("home?show=detail&id={$idTempat}"))->with('error', 'Gagal menyimpan ulasan ke database.');
        }
    }
     public function addMenuItem()
    {
        $session = session();
        if (!$session->get('isLoggedIn')) {
            return redirect()->to(base_url('login'))->with('error', 'Anda harus login.');
        }
        $idTempat = $this->request->getPost('ID_tempat');
        $rules = [
            'ID_tempat'    => 'required|integer',
            'nama_menu'    => 'required|max_length[100]',
            'harga_menu'   => 'required|numeric',
            'deskripsi_menu' => 'permit_empty|max_length[500]',
            'foto_menu'    => [
                'label' => 'Image File',
                'rules' => 'is_image[foto_menu]|max_size[foto_menu,2048]|ext_in[foto_menu,png,jpg,jpeg]',
            ],
        ];


        if (!$this->validate($rules)) {
            return redirect()->to(base_url('home?show=detail&id=' . $idTempat))->withInput()->with('errors', $this->validator->getErrors());
        }

        $fotoMenuFile = $this->request->getFile('foto_menu');
        $namaFoto = null;

        if ($fotoMenuFile && $fotoMenuFile->isValid() && !$fotoMenuFile->hasMoved()) {
            $namaFoto = $fotoMenuFile->getRandomName();
            $fotoMenuFile->move(ROOTPATH . 'public/Assets/menu_photos/', $namaFoto);
        }

        $menuModel = new MenuModel();
        $dataToSave = [ 
            'ID_tempat'     => $idTempat,
            'nama_menu'     => $this->request->getPost('nama_menu'),
            'harga_menu'    => $this->request->getPost('harga_menu'),
            'deskripsi_menu'=> $this->request->getPost('deskripsi_menu'),
            'foto_menu'     => $namaFoto,
        ];

        if ($menuModel->save($dataToSave)) {
            return redirect()->to(base_url('home?show=detail&id=' . $dataToSave['ID_tempat']))->with('success', 'Menu baru berhasil ditambahkan!');
        } else {
            return redirect()->to(base_url('home?show=detail&id=' . $dataToSave['ID_tempat']))->with('error', 'Gagal menyimpan menu ke database.');
        }
    }

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
            'harga_tiket'   => 'if_exist',
            'file_upload'   => 'if_exist|uploaded[file_upload]|max_size[file_upload,2048]|ext_in[file_upload,jpg,jpeg,png,gif]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors())->with('active_panel', 'addPlace'); 
        }

        $tempatModel = new TempatModel();
        $pengajuanTempatModel = new PengajuanTempatModel();
        $uploadedFiles = $this->request->getFiles();
        $fotoFileNames = [];

        if ($uploadedFiles) {
            foreach ($uploadedFiles['file_upload'] as $file) {
                if ($file->isValid() && !$file->hasMoved()) {
                    $newName = $file->getRandomName();
                    $file->move(FCPATH . 'Assets', $newName); 
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
            'google_maps'   => $this->request->getPost('gmaps'),
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
            $dataToInsert['ID_akun'] = $session->get('ID_akun'); 
            $username = $session->get('username'); 

            if ($pengajuanTempatModel->insert($dataToInsert)) {
                
                $notifModel = new NotifikasiModel();

                $notifToInsert = [
                    'ID_akun'   => 1,
                    'header'    => 'Request for new place addition',
                    'isi_notif' => "$username has submitted a request to add a new place.",
                ];

                $notifModel->insert($notifToInsert);
                
                return redirect()->to(base_url('home'))->with('success', 'Tempat berhasil diajukan dan sedang menunggu verifikasi dari admin.');

            } else {
                return redirect()->back()->withInput()->with('error', 'Gagal mengajukan tempat baru.')->with('errors', $pengajuanTempatModel->errors());
            }
        }
    }
    public function addPromoItem()
{
    $session = session();
    if (!$session->get('isLoggedIn')) {
        return redirect()->to(base_url('login'))->with('error', 'Anda harus login.');
    }

    $idTempat = $this->request->getPost('ID_tempat');

    $rules = [
        'ID_tempat'       => 'required|integer',
        'nama_promo'      => 'required|max_length[150]',
        'deskripsi_promo' => 'required|max_length[500]',
        'valid_until'     => 'permit_empty|valid_date', 
    ];

    if (!$this->validate($rules)) {
        return redirect()->to(base_url('home?show=detail&id=' . $idTempat))
                         ->withInput()
                         ->with('errors', $this->validator->getErrors());
    }

    $promoModel = new PromoModel();
    $dataToSave = [
        'ID_tempat'       => $idTempat,
        'nama_promo'      => $this->request->getPost('nama_promo'),
        'deskripsi_promo' => $this->request->getPost('deskripsi_promo'),
        'valid_until'     => $this->request->getPost('valid_until'),
    ];

    if ($promoModel->save($dataToSave)) {
        return redirect()->to(base_url('home?show=detail&id=' . $idTempat))->with('success', 'Promo baru berhasil ditambahkan!');
    } else {
        return redirect()->to(base_url('home?show=detail&id=' . $idTempat))->with('error', 'Gagal menyimpan promo ke database.');
    }
}

public function deleteMenuItem()
    {
        $session = session();
        $id_menu = $this->request->getPost('id_menu');
        $id_tempat = $this->request->getPost('id_tempat');

        if (empty($id_menu) || empty($id_tempat)) {
            return redirect()->back()->with('error', 'Data tidak valid.');
        }

        $menuModel = new MenuModel();
        $tempatModel = new TempatModel();
        
        $menuItem = $menuModel->find($id_menu);
        if (!$menuItem) {
            return redirect()->back()->with('error', 'Menu tidak ditemukan.');
        }

        $tempat = $tempatModel->find($menuItem['ID_tempat']);

        if (session()->get('user_role') !== 'admin' && session()->get('ID_akun') !== $tempat['ID_akun']) {
            return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk melakukan aksi ini.');
        }

        if (!empty($menuItem['foto_menu'])) {
            $filePath = FCPATH . 'Assets/menu_photos/' . $menuItem['foto_menu'];
            if (is_file($filePath)) {
                unlink($filePath);
            }
        }

        if ($menuModel->delete($id_menu)) {
            return redirect()->to(base_url("home?show=detail&id={$id_tempat}"))->with('success', 'Menu berhasil dihapus.');
        } else {
            return redirect()->to(base_url("home?show=detail&id={$id_tempat}"))->with('error', 'Gagal menghapus menu.');
        }
    }

    public function deletePromoItem()
    {
        $session = session();
        $id_promo = $this->request->getPost('id_promo');
        $id_tempat = $this->request->getPost('id_tempat');

        if (empty($id_promo) || empty($id_tempat)) {
            return redirect()->back()->with('error', 'Data tidak valid.');
        }
        
        $promoModel = new PromoModel();
        $tempatModel = new TempatModel();

        $promoItem = $promoModel->find($id_promo);
        if (!$promoItem) {
            return redirect()->back()->with('error', 'Promo tidak ditemukan.');
        }
        
        $tempat = $tempatModel->find($promoItem['ID_tempat']);

        if (session()->get('user_role') !== 'admin' && session()->get('ID_akun') !== $tempat['ID_akun']) {
            return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk melakukan aksi ini.');
        }

        if ($promoModel->delete($id_promo)) {
            return redirect()->to(base_url("home?show=detail&id={$id_tempat}"))->with('success', 'Promo berhasil dihapus.');
        } else {
            return redirect()->to(base_url("home?show=detail&id={$id_tempat}"))->with('error', 'Gagal menghapus promo.');
        }
    }


    public function submitClaimForm()
    {
        $session = session();


        if (!$session->get('isLoggedIn')) {
            return redirect()->to(base_url('login'))->with('error', 'Anda harus login untuk menambahkan tempat.');
        }
        if (!in_array($session->get('user_role'), ['user', 'pemilik', 'admin'])) {
            return redirect()->to(base_url('home'))->with('error', 'Anda tidak memiliki izin untuk menambahkan tempat.');
        }

        $idTempat = $this->request->getPost('ID_tempat');
        if (empty($idTempat) || !is_numeric($idTempat)) {
            return redirect()->back()->with('error', 'ID Tempat tidak valid atau tidak ditemukan di URL.')->with('active_panel', 'claimForm');
        }

        $rules = [
            'nama_lengkap'    => 'required|min_length[3]|max_length[255]',
            'email' => 'required',
            'npwp'   => 'required',
            'no_hp'   => 'required|is_natural',
            'dokumen_pendukung' => 'permit_empty|max_size[dokumen_pendukung,2048]|ext_in[dokumen_pendukung,jpg,jpeg,png,gif]',
        ];

        $validationMessages = [
            'dokumen_pendukung' => [
                'uploaded'  => 'Anda harus memilih file untuk dokumen pendukung.', 
                'max_size'  => 'Ukuran file dokumen pendukung terlalu besar (maksimal 2MB).',
                'ext_in'    => 'Format file dokumen pendukung tidak didukung. Hanya JPG, JPEG, PNG, GIF yang diizinkan.',
            ],
        ];


        $file = $this->request->getFile('dokumen_pendukung');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $rules['dokumen_pendukung'] = 'uploaded[dokumen_pendukung]|' . $rules['dokumen_pendukung'];
        }

        if (!$this->validate($rules, $validationMessages)) {
            dd($this->validator->getErrors());
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors())->with('active_panel', 'addPlace');
        }

        $klaimKulinerModel = new KlaimKulinerModel();
        $uploadedFiles = $this->request->getFiles();
        $fotoFileNames = [];

        if (isset($uploadedFiles['dokumen_pendukung'])) {
            foreach ($uploadedFiles['dokumen_pendukung'] as $file) {
                if ($file->isValid() && !$file->hasMoved()) {
                    $newName = $file->getRandomName();
                    $file->move(FCPATH . 'Assets', $newName);
                    $fotoFileNames[] = $newName;
                }
            }
        }
        
        $dataToInsert = [
            'nama_lengkap'          => $this->request->getPost('nama_lengkap'),
            'email'                 => $this->request->getPost('email'),
            'npwp'                  => $this->request->getPost('npwp'),
            'no_hp'                 => $this->request->getPost('no_hp'),
            'dokumen_pendukung'     => !empty($fotoFileNames) ? implode(',', $fotoFileNames) : null,
            'ID_akun' => $session->get('ID_akun'), 
            'ID_tempat' => $idTempat, 
            'is_verified'           => 0, 
        ];

        $insertResult = $klaimKulinerModel->insert($dataToInsert);
      

        $username = $session->get('username'); 

        if ($insertResult) {
            
            $notifModel = new NotifikasiModel();

            $notifToInsert = [
                'ID_akun'   => 1,
                'header'    => 'Request for culinary site claim',
                'isi_notif' => "$username has submitted a request to claim a culinary site.",
            ];

            $notifModel->insert($notifToInsert);
            
            return redirect()->to(base_url('home'))->with('success', 'Form klaim berhasil diajukan dan sedang menunggu verifikasi dari admin.');

        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal mengajukan form klaim.')->with('errors', $klaimKulinerModel->errors());
        }
    }
    public function updateTempat()
{
    $session = session();
    $id_tempat = $this->request->getPost('id_tempat'); 
    $tempatModel = new TempatModel();

    if (!$session->get('isLoggedIn')) {
        return redirect()->to(base_url('login'));
    }

    $rules = [
        'id_tempat'   => 'required|integer',
        'nama_tempat' => 'required|max_length[255]',
        'deskripsi'   => 'required',
    ];

    if (!$this->validate($rules)) {
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    $tempat = $tempatModel->find($id_tempat);
    if (!$tempat) {
        return redirect()->to(base_url('home'))->with('error', 'Tempat tidak ditemukan.');
    }

    if ($session->get('user_role') !== 'admin' && $session->get('ID_akun') != $tempat['ID_akun']) {
        return redirect()->to(base_url('home'))->with('error', 'Anda tidak memiliki izin untuk mengedit tempat ini.');
    }

    $dataToUpdate = [
        'nama_tempat' => $this->request->getPost('nama_tempat'),
        'deskripsi'   => $this->request->getPost('deskripsi'),
    ];

    if ($tempatModel->update($id_tempat, $dataToUpdate)) {
        return redirect()->to(site_url('home?show=detail&id=' . $id_tempat))->with('success', 'Informasi tempat berhasil diperbarui.');
    } else {
        return redirect()->back()->withInput()->with('error', 'Gagal memperbarui informasi tempat.');
    }
}
}