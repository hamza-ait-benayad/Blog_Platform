<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = ['name', 'created_at', 'updated_at'];

    // Enable automatic timestamps for created_at and updated_at fields
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    /**
     * Get all categories.
     *
     * @return array
     */
    public function getAllCategories()
    {
        return $this->orderBy('name', 'ASC')->findAll();
    }
}
