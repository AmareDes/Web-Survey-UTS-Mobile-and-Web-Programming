<?php

namespace App\Models;

use CodeIgniter\Model;

class QuestionModel extends Model
{
    protected $table = 'tabel_pertanyaan';
    protected $primaryKey = 'id_pertanyaan';
    protected $allowedFields = ['id_survey', 'pertanyaan', 'tipe_pertanyaan'];
}
