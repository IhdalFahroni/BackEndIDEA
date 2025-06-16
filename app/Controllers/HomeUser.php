<?php

namespace App\Controllers;

class HomeUser extends BaseController
{
    public function homeuser(): string
    {
        return view('HomePageUser');
    }
}
