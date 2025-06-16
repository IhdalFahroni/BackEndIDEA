<?php

namespace App\Controllers;

class SignUp extends BaseController
{
    public function changepass(): string
    {
        return view('ChangePasswordPage');
    }
}
