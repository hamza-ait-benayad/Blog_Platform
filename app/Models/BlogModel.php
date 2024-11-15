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

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';


    public function getAllBlogs()
    {
        return $this->select('blogs.id, blogs.title, blogs.content, blogs.created_at, blogs.updated_at, users.username AS author, categories.name AS category, COUNT(comments.id) AS NbComment')
                    ->join('users', 'users.id = blogs.user_id')
                    ->join('categories', 'categories.id = blogs.category_id', 'left')
                    ->join('comments', 'comments.blog_id = blogs.id', 'left')
                    ->groupBy('blogs.id, blogs.title, blogs.content, blogs.created_at, blogs.updated_at, users.username, categories.name') // Include all selected columns
                    ->orderBy('blogs.created_at', 'DESC')
                    ->findAll();
    }
    

    // public function getBlogById($id)
    // {
    //     return $this->select('blogs.*, users.username AS author, categories.name AS category')
    //                 ->join('users', 'users.id = blogs.user_id')
    //                 ->join('categories', 'categories.id = blogs.category_id', 'left')
    //                 ->where('blogs.id', $id)
    //                 ->first();
    // }
}
