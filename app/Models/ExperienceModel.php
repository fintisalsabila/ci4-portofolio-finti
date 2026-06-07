<?php

namespace App\Models;

use CodeIgniter\Model;

class ExperienceModel extends Model
{
    protected $table = 'experiences';
    protected $primaryKey = 'id';
    protected $allowedFields = ['company', 'position', 'type', 'start_date', 'end_date', 'is_current', 'description', 'order'];
    protected $useTimestamps = true;
}