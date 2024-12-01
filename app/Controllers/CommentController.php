<?php

namespace App\Controllers;

use App\Models\BlogModel;
use App\Models\CommentModel;
use App\Models\ReplyModel;
use CodeIgniter\Controller;

class CommentController extends Controller
{
    public function store($blogId)
    {
        $commentModel = new CommentModel();

        $data = [
            'blog_id'  => $blogId,
            'user_id'  => session()->get('user_id'),
            'comment'  => $this->request->getPost('comment'),
        ];

        $commentModel->insert($data);

        return redirect()->to('/blogs/show/' . $blogId);
    }

    public function delete($id)
    {
        $commentModel = new CommentModel();
        $blogModel = new BlogModel();
        $comment = $commentModel->find($id);

        if (!$comment) {
            return redirect()->back()->with('error', 'Comment not found.');
        }

        $blog = $blogModel->find($comment['blog_id']);

        if (!$blog) {
            return redirect()->back()->with('error', 'Blog not found.');
        }

        $loggedInUserId = session()->get('user_id');
        if ($comment['user_id'] !== $loggedInUserId && $blog['user_id'] !== $loggedInUserId) {
            return redirect()->back()->with('error', 'You are not authorized to delete this comment.');
        }

        $blogId = $comment['blog_id'];
        $commentModel->delete($id);
        return redirect()->to('/blogs/show/' . $blogId)->with('success', 'Comment deleted successfully.');
    }

    public function addReply()
{
    $replyModel = new ReplyModel();

    $data = [
        'comment_id' => $this->request->getPost('comment_id'),
        'blog_id' => $this->request->getPost('blog_id'),
        'user_id' => session()->get('user_id'),
        'content' => $this->request->getPost('content'),
    ];

    if ($replyModel->insert($data)) {
        return redirect()->back()->with('success', 'Reply added successfully.');
    }

    return redirect()->back()->with('error', 'Failed to add reply.');
}

}
