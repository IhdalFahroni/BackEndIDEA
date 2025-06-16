<?php

namespace App\Controllers;

class Landing extends BaseController
{
    public function landingPage(): string
    {
        // Perhatikan nama 'LandingPage' harus sama persis dengan nama file Anda
        // /app/Views/LandingPage.php
        return view('LandingPage');
    }
}