<?php

namespace App\Controllers;

use App\Models\CommentModel;
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

        return redirect()->to('/blogs/' . $blogId);
    }

    public function delete($id)
    {
        $commentModel = new CommentModel();

        $comment = $commentModel->find($id);
        $blogId = $comment['blog_id'];

        $commentModel->delete($id);

        return redirect()->to('/blogs/' . $blogId);
    }
}
