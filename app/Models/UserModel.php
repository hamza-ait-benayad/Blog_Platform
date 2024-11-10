<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users';                 
    protected $primaryKey       = 'id';                    
    protected $useAutoIncrement = true;                    
    protected $returnType       = 'array';                 
    protected $useSoftDeletes   = false;                   

    protected $allowedFields    = ['username', 'email', 'password', 'created_at', 'updated_at'];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules = [
        'username' => 'required|min_length[3]|max_length[20]',
        'email'    => 'required|valid_email|is_unique[users.email]', 
        'password' => 'required|min_length[6]',
    ];

    protected $validationMessages = [
        'username' => [
            'required'    => 'The username field is required.',
            'min_length'  => 'Username must be at least 3 characters long.',
            'max_length'  => 'Username cannot exceed 20 characters.',
        ],
        'email' => [
            'required'    => 'The email field is required.',
            'valid_email' => 'Please provide a valid email address.',
            'is_unique'   => 'This email is already registered.',
        ],
        'password' => [
            'required'   => 'The password field is required.',
            'min_length' => 'Password must be at least 6 characters long.',
        ],
    ];

    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
