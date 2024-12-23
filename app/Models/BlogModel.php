<?php

namespace App\Models;

use CodeIgniter\Model;

class BlogModel extends Model
{
    protected $table = 'blogs';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = ['title', 'image_path', 'content', 'user_id', 'category_id', 'created_at', 'updated_at'];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';


    public function getAllBlogs()
    {
        return $this->select('blogs.id, blogs.title, blogs.image_path, blogs.content, blogs.created_at, blogs.updated_at, users.username AS author, categories.name AS category, COUNT(comments.id) AS NbComment')
            ->join('users', 'users.id = blogs.user_id')
            ->join('categories', 'categories.id = blogs.category_id', 'left')
            ->join('comments', 'comments.blog_id = blogs.id', 'left')
            ->groupBy('blogs.id, blogs.title, blogs.content, blogs.created_at, blogs.updated_at, users.username, categories.name, blogs.image_path') // Include all selected columns
            ->orderBy('blogs.created_at', 'DESC');
    }

    public function getBlogsByCategory($categoryId)
    {
        return $this->select('blogs.id, blogs.title, blogs.image_path, blogs.content, blogs.created_at, blogs.updated_at, users.username AS author, categories.name AS category, COUNT(comments.id) AS NbComment')
            ->join('users', 'users.id = blogs.user_id')
            ->join('categories', 'categories.id = blogs.category_id', 'left')
            ->join('comments', 'comments.blog_id = blogs.id', 'left')
            ->where('blogs.category_id', $categoryId)
            ->groupBy('blogs.id, blogs.title, blogs.content, blogs.created_at, blogs.updated_at, users.username, categories.name, blogs.image_path') // Include all selected columns
            ->orderBy('blogs.created_at', 'DESC');
    }
    

    public function getMyBlogs($userId)
    {
        return $this->select('blogs.id, blogs.title, blogs.image_path, blogs.content, blogs.created_at, blogs.updated_at, users.username AS author, categories.name AS category, COUNT(comments.id) AS NbComment')
            ->join('users', 'users.id = blogs.user_id')
            ->join('categories', 'categories.id = blogs.category_id', 'left')
            ->join('comments', 'comments.blog_id = blogs.id', 'left')
            ->where('blogs.user_id', $userId)
            ->groupBy('blogs.id, blogs.title, blogs.content, blogs.created_at, blogs.updated_at, users.username, categories.name') // Include all selected columns
            ->orderBy('blogs.created_at', 'DESC');
    }

    public function getBlogById($id)
{
    $blog = $this->select('blogs.*, users.username AS author, categories.name AS category, COUNT(comments.id) AS NbComment')
        ->join('users', 'users.id = blogs.user_id', 'inner')
        ->join('categories', 'categories.id = blogs.category_id', 'left')
        ->join('comments', 'comments.blog_id = blogs.id', 'left')
        ->where('blogs.id', $id)
        ->groupBy('blogs.id')
        ->first();

    if (!$blog) {
        return null;
    }

    $commentsModels = new CommentModel();
    $comments = $commentsModels->getCommentsByBlog($id);

    $blog['comments'] = $comments;

    return $blog;
}

public function getPopularBlogs($limit = 6)
{
    return $this->select('blogs.*, COUNT(comments.id) as comment_count, users.username AS author')
                ->join('users', 'users.id = blogs.user_id', 'inner')
                ->join('comments', 'comments.blog_id = blogs.id', 'left')
                ->groupBy('blogs.id')
                ->orderBy('comment_count', 'DESC')
                ->limit($limit)
                ->findAll();
}


}
