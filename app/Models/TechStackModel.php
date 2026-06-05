<?php

namespace App\Models;

use CodeIgniter\Model;

class TechStackModel extends Model
{
    protected $table = 'tech_stacks';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'category', 'icon', 'level', 'created_at'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = false;
}