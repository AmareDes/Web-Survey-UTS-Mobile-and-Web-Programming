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

        // Ambil data survei yang telah disimpan
        $savedSurveys = $surveyModel->findAll(); // Mengambil semua data survei dari database

        // Simpan data survei dalam array $surveys
        $surveys = [];
        foreach ($savedSurveys as $savedSurvey) {
            $survey = [
                'judul_survey' => $savedSurvey['judul_survey'],
                'deskripsi' => $savedSurvey['deskripsi'],
                'tanggal_dibuat' => $savedSurvey['tanggal_dibuat'],
                'pertanyaan' => [],
            ];

            // Ambil pertanyaan yang terkait dengan survei
            $questions = $questionModel->where('id_survey', $savedSurvey['id_survey'])->findAll(); // Mengambil pertanyaan terkait dengan survei dari database

            foreach ($questions as $question) {
                $survey['pertanyaan'][] = [
                    'pertanyaan' => $question['pertanyaan'],
                    'tipe_pertanyaan' => $question['tipe_pertanyaan'],
                    'jawaban' => $question['jawaban'],
                ];
            }

            $surveys[] = $survey;
        }

        return redirect()->to('survey/survey_list')->with('success', 'Survei berhasil ditambahkan.');
    }

    // Metode lainnya...

}
