<?php

namespace App\Controllers;

class HomeAdmin extends BaseController
{
    public function homeadmin(): string
    {
        return view('HomePageAdmin');
    }
}
