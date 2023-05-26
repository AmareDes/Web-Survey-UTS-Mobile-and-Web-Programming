<?php

namespace App\Controllers;

class Anime extends BaseController
{
    public function index()
    {
        $data = [
            'tittle' => 'Daftar Anime'
        ];

        return view('anime/index', $data);
    }
}
