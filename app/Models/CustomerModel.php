<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model
{
    protected $table = 'customers';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useTimestamps = true;
    protected $allowedFields = ['full_name', 'email', 'phone'];
    protected $validationRules = [
        'full_name' => 'required|min_length[2]|max_length[100]',
        'email' => 'required|valid_email|max_length[150]',
        'phone' => 'permit_empty|max_length[30]',
    ];
    protected $validationMessages = [
        'full_name' => ['required' => 'Full name is required.'],
        'email' => ['required' => 'Email is required.', 'valid_email' => 'Enter a valid email address.'],
    ];
}
