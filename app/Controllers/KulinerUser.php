<?php

namespace App\Controllers;

class KulinerUser extends BaseController
{
    public function kulineruser(): string
    {
        return view('detailTempatKulinerUser');
    }
}
