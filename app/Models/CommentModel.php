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
        $comments = $this
            ->select('comments.*, users.username AS commenter')
            ->join('users', 'users.id = comments.user_id')
            ->orderBy('comments.created_at', 'DESC')
            ->where('blog_id', $blogId)
            ->get()
            ->getResultArray();

            $replyModel = new \App\Models\ReplyModel();

            foreach ($comments as &$comment) {
                $comment['replies'] = $replyModel
                ->select('replies.*, users.username AS replier')
                ->join('users', 'users.id = replies.user_id')
                ->where('comment_id', $comment['id'])
                    ->orderBy('created_at', 'ASC')
                    ->findAll();
            }
        
        return $comments;
    }

    /**
     * Get all comments made by a specific user.
     *
     * @param int $userId
     * @return array
     */

}
