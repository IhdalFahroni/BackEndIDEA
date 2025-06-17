<?php

namespace App\Controllers;

class KulinerAdmin extends BaseController
{
    public function kulineradmin(): string
    {
        return view('detailTempatKulinerAdmin');
    }
}
