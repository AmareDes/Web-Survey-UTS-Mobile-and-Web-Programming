<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'tittle' => 'Home | Web Aldi Putra Widyansyah',
            'array' => ['Satu', 'Dua', 'Tiga']
        ];
        echo view('pages/beranda', $data);
    }
    public function survey()
    {
        $data = [
            'tittle' => 'Survey'
        ];
        return view('pages/survey', $data);
    }
    public function survey_list()
    {
        $data = [
            'tittle' => 'Survey List'
        ];
        return view('pages/survey_list', $data);
    }
}
