<?php

namespace App\Controllers;

class SignUp extends BaseController
{
    public function signup(): string
    {
        return view('SignUpPage');
    }
}
