<?php

namespace App\Controllers;

use App\Models\TempatModel;
use App\Models\PengajuanTempatModel;
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

        // Validasi role admin di awal
        if ($session->get('user_role') !== 'admin') {
            return redirect()->to(base_url('home'))->with('error', 'Hanya admin yang dapat melakukan verifikasi ini.');
        }

        if ($this->request->getMethod() === 'post') {
            $requestId = $this->request->getPost('request_id');
            $action = $this->request->getPost('action');

            if (empty($requestId) || !in_array($action, ['approve', 'deny'])) {
                return redirect()->back()->with('error', 'Permintaan tidak valid.');
            }

            $pengajuanTempatModel = new PengajuanTempatModel();
            $itemDetail = $this->$pengajuanTempatModel->find($requestId);

            // Jika item tidak ditemukan, handle error
            if (!$itemDetail) {
                return redirect()->back()->with('error', 'Item verifikasi tidak ditemukan.');
            }

            $newIsVerifiedStatus = 0;
            $notificationHeader = '';
            $notificationContent = '';

            // Tentukan status dan konten notifikasi berdasarkan aksi dan tipe item
            if ($action === 'approve') {
                $newIsVerifiedStatus = 2; // Disetujui
                if ($itemDetail->kategori === 'addPlace') { // Asumsi kolom kategori menyimpan tipe item 'addPlace'
                    $notificationHeader = 'New Place Approved';
                    $notificationContent = "Request for \"{$itemDetail->nama_tempat}\" has been approved. You can search for \"{$itemDetail->nama_tempat}\" from now on.";
                } else {
                    // Logika untuk tipe item lain jika ada (misal: 'claimCulinary')
                    $notificationHeader = 'Request Approved';
                    $notificationContent = 'Your request has been approved.';
                }
            } elseif ($action === 'deny') {
                $newIsVerifiedStatus = 1; // Ditolak
                if ($itemDetail->kategori === 'addPlace') { // Asumsi kolom kategori menyimpan tipe item 'addPlace'
                    $notificationHeader = 'New Place Denied';
                    $notificationContent = "Request for \"{$itemDetail->nama_tempat}\" has been denied.";
                } else {
                    // Logika untuk tipe item lain jika ada
                    $notificationHeader = 'Request Denied';
                    $notificationContent = 'Your request has been denied.';
                }
            }

            // Data yang akan di-update ke database
            $dataToUpdate = [
                'is_verified' => $newIsVerifiedStatus
            ];

            // Update record di database
            $updated = $this->$pengajuanTempatModel->update($requestId, $dataToUpdate);

            if ($updated) {
                $notifModel = new NotifikasiModel();
                $message = ($action === 'approve') ? 'Permintaan berhasil disetujui.' : 'Permintaan berhasil ditolak.';

                // --- LOGIKA NOTIFIKASI UNTUK PENGGUNA YANG MENGAJUKAN REQUEST ---
                // ID_akun dari pengguna yang mengajukan request ada di $itemDetail->ID_akun
                $recipientAccountId = $itemDetail->ID_akun;

                $notifToInsert = [
                    'ID_akun'   => $recipientAccountId, // Notifikasi dikirim ke ID_akun pengaju request
                    'header'    => $notificationHeader,
                    'isi_notif' => $notificationContent,
                ];

                $this->$notifModel->insert($notifToInsert); // Gunakan properti model yang sudah diinisialisasi

                return redirect()->back()->with('success', $message);
            } else {
                return redirect()->back()->with('error', 'Gagal memproses permintaan.');
            }
        } else {
            return redirect()->back()->with('error', 'Akses ditolak.');
        }
    }
     public function deleteReview()
    {
        $session = session();
        if ($session->get('user_role') !== 'admin') {
            return redirect()->to(base_url('home'))->with('error', 'Akses ditolak.');
        }
        $id_review = $this->request->getPost('id_review');
        $id_tempat = $this->request->getPost('id_tempat');

        // =======================================================
        //          SEKRING PENGAMAN DITAMBAHKAN DI SINI
        // =======================================================
        // Jika karena alasan APAPUN id_review kosong, hentikan proses SEKARANG JUGA.
        if (empty($id_review)) {
            return redirect()->to(base_url("home?show=detail&id={$id_tempat}"))
                            ->with('error', 'Terjadi kesalahan: ID Review tidak valid. Tidak ada data yang dihapus.');
        }

        // 1. Validasi Input dari form modal
        $rules = [
            'id_review'    => 'required|integer',
            'id_tempat'    => 'required|integer',
            'alasan_hapus' => 'required|in_list[inappropriate_word,misleading_info,offensive,spam]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->with('error', 'Mohon pilih alasan penghapusan.');
        }

        $id_review = $this->request->getPost('id_review');
        $id_tempat = $this->request->getPost('id_tempat');
        $alasan_value = $this->request->getPost('alasan_hapus');

        $reviewModel = new ReviewModel();
        $notifModel = new NotifikasiModel();

        // 2. Ambil data review SEBELUM dihapus untuk mendapatkan ID pemiliknya
        $review = $reviewModel->find($id_review);

        if (!$review) {
            return redirect()->to(base_url("home?show=detail&id={$id_tempat}"))->with('error', 'Review tidak ditemukan atau sudah dihapus.');
        }

        // 3. Hapus review dari database
        if ($reviewModel->delete($id_review)) {
            
            // 4. Buat notifikasi untuk pengguna yang review-nya dihapus
            $alasan_map = [
                'inappropriate_word' => 'penggunaan kata yang tidak pantas',
                'misleading_info'    => 'informasi yang menyesatkan',
                'offensive'          => 'bersifat menyinggung',
                'spam'               => 'dianggap spam atau promosi'
            ];
            $alasan_teks = $alasan_map[$alasan_value] ?? 'alasan lain';
            
            $notifData = [
                'ID_akun'   => $review['ID_akun'], // ID pemilik review
                'header'    => 'Ulasan Anda Dihapus',
                'isi_notif' => "Ulasan Anda telah dihapus oleh admin karena " . $alasan_teks . "."
            ];
            $notifModel->save($notifData);

            return redirect()->to(base_url("home?show=detail&id={$id_tempat}"))->with('success', 'Review berhasil dihapus.');
        } else {
            return redirect()->to(base_url("home?show=detail&id={$id_tempat}"))->with('error', 'Gagal menghapus review.');
        }
    }
}