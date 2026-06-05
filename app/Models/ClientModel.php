<?php

namespace App\Models;

use CodeIgniter\Model;

class ClientModel extends Model
{
    protected $table = 'clients';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'email', 'phone', 'service_interest', 'message', 'status', 'created_at'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = false;
    
    // Optional: Add validation rules
    protected $validationRules = [
        'name' => 'required|min_length[3]',
        'email' => 'required|valid_email',
        'phone' => 'required|min_length[10]',
        'message' => 'required|min_length[10]'
    ];
    
    protected $validationMessages = [
        'name' => [
            'required' => 'Nama lengkap wajib diisi',
            'min_length' => 'Nama minimal 3 karakter'
        ],
        'email' => [
            'required' => 'Email wajib diisi',
            'valid_email' => 'Format email tidak valid'
        ],
        'phone' => [
            'required' => 'Nomor telepon wajib diisi',
            'min_length' => 'Nomor telepon minimal 10 digit'
        ],
        'message' => [
            'required' => 'Pesan wajib diisi',
            'min_length' => 'Pesan minimal 10 karakter'
        ]
    ];
}