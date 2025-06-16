<?php

namespace App\Controllers;

class HomePemilik extends BaseController
{
    public function homepemilik(): string
    {
        return view('HomePagePemilik');
    }
}
