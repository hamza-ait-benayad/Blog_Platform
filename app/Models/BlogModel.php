<?php

namespace App\Models;

use CodeIgniter\Model;

class BlogModel extends Model
{
    protected $table = 'blogs';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = ['title', 'content', 'user_id', 'category_id', 'created_at', 'updated_at'];

    // Enable automatic timestamps for created_at and updated_at fields
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    // /**
    //  * Get all blogs with user and category information.
    //  *
    //  * @return array
    //  */
    // public function getAllBlogs()
    // {
    //     return $this->select('blogs.*, users.username AS author, categories.name AS category')
    //                 ->join('users', 'users.id = blogs.user_id')
    //                 ->join('categories', 'categories.id = blogs.category_id', 'left')
    //                 ->orderBy('blogs.created_at', 'DESC')
    //                 ->findAll();
    // }

    // /**
    //  * Get blog details by ID with user and category information.
    //  *
    //  * @param int $id
    //  * @return array|null
    //  */
    // public function getBlogById($id)
    // {
    //     return $this->select('blogs.*, users.username AS author, categories.name AS category')
    //                 ->join('users', 'users.id = blogs.user_id')
    //                 ->join('categories', 'categories.id = blogs.category_id', 'left')
    //                 ->where('blogs.id', $id)
    //                 ->first();
    // }
}
