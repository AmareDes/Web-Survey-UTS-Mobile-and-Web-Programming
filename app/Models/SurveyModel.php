<?php

namespace App\Models;

use CodeIgniter\Model;

class SurveyModel extends Model
{
    protected $table = 'tabel_survey';
    protected $primaryKey = 'id_survey';
    protected $allowedFields = ['judul_survey', 'deskripsi', 'tanggal_dibuat', 'pertanyaan', 'tipe_pertanyaan'];

    public function getSurvey($id = null)
    {
        if ($id) {
            return $this->find($id);
        } else {
            return $this->findAll();
        }
    }

    public function saveSurvey($data)
    {
        return $this->insert($data);
    }

    public function updateSurvey($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteSurvey($id)
    {
        return $this->delete($id);
    }
}
