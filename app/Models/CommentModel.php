<?php

namespace App\Models;

use CodeIgniter\Model;

class CommentModel extends Model
{
    protected $table = 'comments';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = ['blog_id', 'user_id', 'comment', 'created_at', 'updated_at'];

    // Enable automatic timestamps for created_at and updated_at fields
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    /**
     * Get all comments related to a specific blog post.
     *
     * @param int $blogId
     * @return array
     */
    public function getCommentsByBlog($blogId)
    {
        return $this->where('blog_id', $blogId)
                    ->join('users', 'users.id = comments.user_id')
                    ->orderBy('comments.created_at', 'DESC')
                    ->findAll();
    }

    /**
     * Get all comments made by a specific user.
     *
     * @param int $userId
     * @return array
     */
    public function getCommentsByUser($userId)
    {
        return $this->where('user_id', $userId)
                    ->join('blogs', 'blogs.id = comments.blog_id')
                    ->orderBy('comments.created_at', 'DESC')
                    ->findAll();
    }
}
