<?php

namespace App\Controllers;

class WisataPemilik extends BaseController
{
    public function wisatapemilik(): string
    {
        return view('detailTempatWisataPemilik');
    }
}
