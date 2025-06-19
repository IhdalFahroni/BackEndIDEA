<?php

namespace App\Controllers;

use App\Models\TempatModel;

class Landing extends BaseController
{
    public function landingPage()
    {
        $tempatModel = new TempatModel();

        $searchTerm = $this->request->getVar('search');
        $category = $this->request->getVar('category');
        $page = $this->request->getVar('page') ?? 1;

        $options = [
            'searchTerm' => $searchTerm,
            'category'   => $category,
            'page'       => $page,
        ];

        $perPage = 9;

        $result = $tempatModel->getTempat($options, $perPage);

        $data = [
            'title'       => 'Lombok Recommendation',
            'js'          => 'Landing.js',
            'destinasi'   => $result['data'],
            'pager'       => $tempatModel->pager,
            'current_search_term' => $searchTerm,
            'active_category'     => $category, // Untuk filter button di mainCards.php
            'current_query'       => $this->request->getGet(), // Untuk filter button di mainCards.php
            // Definisi categories juga perlu dikirim karena digunakan di mainCards.php
            'path' => site_url(''),
            'categories' => [
                'tourist_destination' => [
                    'label' => 'Tourist destination',
                    'icon'  => 'fa-solid fa-location-dot'
                ],
                'culinary' => [
                    'label' => 'Culinary',
                    'icon'  => 'fa-solid fa-utensils'
                ]
            ],
        ];

        return view('pages/LandingPage', $data);
    }
}