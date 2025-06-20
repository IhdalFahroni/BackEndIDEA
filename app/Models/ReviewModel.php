<?php
namespace App\Models;
use CodeIgniter\Model;
class ReviewModel extends Model {
    protected $table = 'review';
    protected $primaryKey = 'ID_review';
    protected $useTimestamps = true; // Review biasanya pakai timestamp
    protected $allowedFields = ['ID_tempat', 'ID_akun', 'rating', 'komentar'];
    // Anda mungkin ingin menambahkan join dengan tabel akun untuk menampilkan nama user di review
    public function getReviewsWithUser(int $idTempat) {
        return $this->select('review.*, akun.username')
                    ->join('akun', 'akun.ID_akun = review.ID_akun')
                    ->where('review.ID_tempat', $idTempat)
                    ->findAll();
    }
}