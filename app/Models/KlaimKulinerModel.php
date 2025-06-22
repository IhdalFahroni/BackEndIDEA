<?php

namespace App\Models;

use CodeIgniter\Model;

class KlaimKulinerModel extends Model
{
    protected $table         = 'form_klaim'; 
    protected $primaryKey    = 'ID_formKlaim';
    protected $useTimestamps = false;
    protected $allowedFields = [
        'ID_akun', 'ID_tempat', 'nama_lengkap', 'no_hp', 'npwp', 'email',
        'dokumen_pendukung', 'is_verified'
    ];
    public function getClaimForm()
    {
        return $this->select('form_klaim.*, akun.username as username, akun.email as email, tempat.nama_tempat as nama_tempat,')
                    ->join('akun', 'akun.ID_akun = form_klaim.ID_akun', 'left')
                    ->join('tempat', 'tempat.ID_tempat = form_klaim.ID_tempat', 'left')
                    ->get()
                    ->getResultArray();
    }
}