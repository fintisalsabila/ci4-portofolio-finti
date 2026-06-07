<?php

namespace App\Models;

use CodeIgniter\Model;

class InquiryModel extends Model
{
    protected $table = 'inquiries';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'email', 'phone', 'service', 'budget', 'message', 'status', 'notes'];
    protected $useTimestamps = true;
}