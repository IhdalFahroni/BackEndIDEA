<?php

namespace App\Controllers;

class KulinerPemilik extends BaseController
{
    public function kulinerpemilik(): string
    {
        return view('detailTempatKulinerPemilik');
    }
}
