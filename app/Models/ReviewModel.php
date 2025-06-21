<?php
namespace App\Models;
use CodeIgniter\Model;
class ReviewModel extends Model {
    protected $table = 'review';
    protected $primaryKey = 'ID_review';
    protected $useTimestamps = true;
    protected $createdField  = 'tanggal_review';
    protected $updatedField  = ''; 

    protected $allowedFields = ['ID_tempat', 'ID_akun', 'rating', 'komentar', 'foto_review']; // Tambahkan 'foto_review'

    public function getReviewsWithUser(int $idTempat) {
        return $this->select('review.*, akun.username')
                    ->join('akun', 'akun.ID_akun = review.ID_akun')
                    ->where('review.ID_tempat', $idTempat)
                    ->orderBy('review.waktu', 'DESC')
                    ->findAll();
    }
}