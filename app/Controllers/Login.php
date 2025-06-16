<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function login(): string
    {
        return view('LoginPage');
    }
}
