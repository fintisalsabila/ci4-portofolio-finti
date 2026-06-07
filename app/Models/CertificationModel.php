<?php

namespace App\Models;

use CodeIgniter\Model;

class CertificationModel extends Model
{
    protected $table = 'certifications';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'issuer', 'issue_date', 'expiry_date', 'credential_url', 'icon', 'order'];
    protected $useTimestamps = true;
}