<?php

namespace App\Controllers;

class WisataUser extends BaseController
{
    public function wisatauser(): string
    {
        return view('detailTempatWisataUser');
    }
}
