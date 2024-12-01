<?php
namespace App\Models;

use CodeIgniter\Model;

class ReplyModel extends Model
{
    protected $table = 'replies';
    protected $primaryKey = 'id';
    protected $allowedFields = ['comment_id', 'blog_id', 'user_id', 'content', 'created_at'];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
}

?>