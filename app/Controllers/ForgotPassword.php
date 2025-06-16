<?php

namespace App\Controllers;

class ForgotPassword extends BaseController
{
    public function forgotpass(): string
    {
        return view('ForgotPasswordPage');
    }
}
