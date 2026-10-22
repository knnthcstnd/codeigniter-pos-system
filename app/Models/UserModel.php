<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useTimestamps = true;
    protected $allowedFields = ['username', 'full_name', 'role', 'avatar'];
    protected $validationRules = [
        'username' => 'required|min_length[3]|max_length[50]',
        'full_name' => 'required|min_length[2]|max_length[100]',
        'role' => 'permit_empty|max_length[50]',
    ];
    protected $validationMessages = [
        'username' => ['required' => 'Username is required.'],
        'full_name' => ['required' => 'Full name is required.'],
    ];
}
