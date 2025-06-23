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
// Tambahkan model lain yang diperlukan di sini

class Admin extends BaseController
{
    protected $helpers = ['url', 'form', 'session', 'filesystem'];

    public function verifyRequest()
    {
        $session = session();
        if ($session->get('user_role') !== 'admin') {
            return redirect()->to(base_url('home'))->with('error', 'Akses ditolak.');
        }

        $action = $this->request->getPost('action'); // Akan bernilai 'approve' atau 'deny'
        $requestType = $this->request->getPost('request_type');

        $requestId = null;
        if ($requestType === 'addPlace') {
            $requestId = $this->request->getPost('pengajuan_id'); // Ambil dari input 'pengajuan_id'
        } elseif ($requestType === 'claimCulinary') {
            $requestId = $this->request->getPost('klaim_id'); // Ambil dari input 'klaim_id'
        }

        if (empty($requestId) || empty($requestType) || !in_array($action, ['approve', 'deny'])) {
            return redirect()->back()->with('error', 'Permintaan tidak valid atau data kurang lengkap.');
        }
    
        $status = ($action === 'approve') ? 2 : 1;

        $success = false;
        $targetUserId = null;

        if ($requestType === 'addPlace') {
            $pengajuanTempatModel = new PengajuanTempatModel();
            $success = $pengajuanTempatModel->update($requestId, ['is_verified' => $status]);

            // Jika disetujui, pindahkan data ke tabel 'tempat'
            if ($success && $status === 2) {
                $formData = $pengajuanTempatModel->find($requestId);
                if ($formData) {
                    $tempatModel = new TempatModel();
                    // Ambil ID_akun dari data pengajuan
                    $targetUserId = $formData['ID_akun'];

                    // Siapkan data untuk tabel 'tempat' (pastikan kolom sesuai)
                    $tempatData = [
                        'nama_tempat'      => $formData['nama_tempat'],
                        'deskripsi'        => $formData['deskripsi'],
                        'kategori'         => $formData['kategori'],
                        'kabupaten_kota'   => $formData['kabupaten_kota'],
                        'kecamatan'        => $formData['kecamatan'],
                        'kelurahan'        => $formData['kelurahan'],
                        'nama_jalan'       => $formData['nama_jalan'],
                        'google_maps'      => $formData['google_maps'],
                        'harga_tiket'      => $formData['harga_tiket'],
                        'foto'             => $formData['foto'],
                    ];
                    $tempatModel->insert($tempatData);
                }
            }

        } elseif ($requestType === 'claimCulinary') {
            $klaimKulinerModel = new KlaimKulinerModel();
            $success = $klaimKulinerModel->update($requestId, ['is_verified' => $status]);

            // Jika disetujui, perbarui kepemilikan di tabel 'tempat'
            if ($success && $status === 2) {
                $klaimData = $klaimKulinerModel->find($requestId);
                if ($klaimData) {
                    $tempatModel = new TempatModel();
                    // ID_akun dari user yang mengajukan klaim
                    $targetUserId = $klaimData['ID_akun'];
                    // Perbarui ID_akun pada tempat yang diklaim
                    $tempatModel->update($klaimData['ID_tempat'], ['ID_akun' => $klaimData['ID_akun']]);
                }
            }

        } else {
            return redirect()->back()->with('error', 'Tipe permintaan tidak dikenal.');
        }
        if ($success) {
            $notifikasiModel = new NotifikasiModel();
            
            if($requestType === 'addPlace') {
                $formData = $pengajuanTempatModel->find($requestId);
                $namaTempat = $formData['nama_tempat'];
                if ($action === 'approve') {
                    $header = 'New place Approved';
                    $notificationMessage = "Request for '$namaTempat' has been approved. You can search for '$namaTempat' from now on.";
                } elseif($action === 'deny') {
                    $header = 'New place Denied';
                    $notificationMessage = "Request for '$namaTempat' has been denied. Please check the information you provide.";
                    $targetUserId = $formData['ID_akun'];
                }
            } elseif ($requestType === 'claimCulinary') {
                $formData = $klaimKulinerModel->find($requestId); // This gets data from form_klaim

                $namaTempat = 'Nama Tempat Tidak Tersedia'; // Default value in case the place name can't be found

                if ($formData && isset($formData['ID_tempat'])) {
                    $tempatModel = new \App\Models\TempatModel(); // Instantiate TempatModel
                    $tempatData = $tempatModel->find($formData['ID_tempat']); // Find the place using ID_tempat from the claim form
                    if ($tempatData && isset($tempatData['nama_tempat'])) {
                        $namaTempat = $tempatData['nama_tempat']; // Get nama_tempat from TempatModel
                    }
                }
                
                if ($action === 'approve') {
                    $header = 'Claim Approved';
                    $notificationMessage = "Claim for '$namaTempat' has been approved. You can edit the information about the culinary site such as place description, menu and promo from now on.";
                } elseif ($action === 'deny') {
                    $header = 'Claim Denied';
                    $notificationMessage = "Claim for '$namaTempat' has been denied. The information provided did not enough to clarify whether or not you are the owner of the culinary site. You can try to provide more supporting documents.";
                    $targetUserId = $formData['ID_akun'];
                }
            }
            if ($targetUserId) {
                $notifikasiModel->insert([
                    'ID_akun'   => $targetUserId,
                    'header'    => $header,
                    'isi_notif' => $notificationMessage,
                ]);
            }
            return redirect()->back()->with('success', 'Status permintaan berhasil diperbarui.');
        } else {
            return redirect()->back()->with('error', 'Gagal memperbarui status permintaan.');
        }
    }
    public function deleteReview()
    {
        // 1. Cek Keamanan
        $session = session();
        if ($session->get('user_role') !== 'admin') {
            return redirect()->to(base_url('home'))->with('error', 'Akses ditolak.');
        }

        // 2. Ambil data dari form
        $id_review = $this->request->getPost('id_review');
        $id_tempat = $this->request->getPost('id_tempat');

        // 3. Sekring Pengaman
        if (empty($id_review)) {
            return redirect()->to(base_url("home?show=detail&id={$id_tempat}"))
                            ->with('error', 'Terjadi kesalahan: ID Review tidak valid. Tidak ada data yang dihapus.');
        }
        
        $reviewModel = new ReviewModel();

        // 4. Ambil data review LENGKAP dari database SEBELUM dihapus
        $review = $reviewModel->find($id_review);

        if (!$review) {
            return redirect()->to(base_url("home?show=detail&id={$id_tempat}"))->with('error', 'Review tidak ditemukan atau sudah dihapus.');
        }

        if (!empty($review['foto'])) { // Sesuaikan 'foto' dengan nama kolom Anda, misal 'foto_review'
            $filePath = FCPATH . 'Assets/review_photos/' . $review['foto'];
            if (is_file($filePath)) {
                unlink($filePath);
            }
        }
        if ($reviewModel->delete($id_review)) {
            $notifModel = new NotifikasiModel();
            $alasan_value = $this->request->getPost('alasan_hapus');
            $alasan_map = [
                'inappropriate_word' => 'use of inappropriate_word',
                'misleading_info'    => 'misleading_info',
                'offensive'          => 'offensive',
                'spam'               => 'spam or promotion'
            ];
            $alasan_teks = $alasan_map[$alasan_value] ?? 'alasan lain';
            
            $notifData = [
                'ID_akun'   => $review['ID_akun'],
                'header'    => 'Your review has been deleted',
                'isi_notif' => "Your review has been deleted because " . $alasan_teks . "."
            ];
            $notifModel->save($notifData);
            return redirect()->to(base_url("home?show=detail&id={$id_tempat}"))->with('success', 'Review dan file gambar terkait berhasil dihapus.');
        } else {
            return redirect()->to(base_url("home?show=detail&id={$id_tempat}"))->with('error', 'Gagal menghapus review dari database.');
        }
    }
}