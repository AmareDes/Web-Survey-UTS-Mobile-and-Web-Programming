<?php

namespace App\Controllers;

use App\Models\QuestionModel;
use App\Models\SurveyModel;

class SurveyController extends BaseController
{
    public function survey()
    {
        return view('pages/survey');
    }

    public function store()
    {
        // Validasi data
        $this->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        // Simpan survei ke database
        $surveyModel = new SurveyModel();
        $questionModel = new QuestionModel();

        $dataSurvey = [
            'judul_survey' => $this->request->getPost('title'),
            'deskripsi' => $this->request->getPost('description'),
            'tanggal_dibuat' => date('Y-m-d')
        ];
        $surveyId = $surveyModel->insert($dataSurvey);

        $pertanyaan = $this->request->getPost('pertanyaan');
        $tipePertanyaan = $this->request->getPost('tipe_pertanyaan');

        if ($pertanyaan && $tipePertanyaan) {
            foreach ($pertanyaan as $index => $pertanyaanItem) {
                $dataQuestion = [
                    'id_survey' => $surveyId,
                    'pertanyaan' => $pertanyaanItem,
                    'tipe_pertanyaan' => $tipePertanyaan[$index]
                ];
                $questionModel->insert($dataQuestion);
            }
        }

        return redirect()->to('/')->with('success', 'Survei berhasil ditambahkan.');
    }

    // Metode lainnya...

}
