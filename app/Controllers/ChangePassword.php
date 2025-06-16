<?php

namespace App\Controllers;

class ChangePassword extends BaseController
{
    public function changepass(): string
    {
        return view('ChangePasswordPage');
    }
}
