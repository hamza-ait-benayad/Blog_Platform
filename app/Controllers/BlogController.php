<?php

namespace App\Controllers;

use App\Models\BlogModel;
use App\Models\CategoryModel;
use CodeIgniter\Controller;

class BlogController extends Controller
{
    public function index()
    {
        $blogModel = new BlogModel();
        $data['blogs'] = $blogModel->findAll();

        return view('blogs/index', $data);
    }

    public function create()
    {
        $categoryModel = new CategoryModel();
        $data['categories'] = $categoryModel->findAll();

        return view('blogs/create', $data);
    }

    public function store()
    {
        $blogModel = new BlogModel();

        $data = [
            'title'       => $this->request->getPost('title'),
            'content'     => $this->request->getPost('content'),
            'user_id'     => session()->get('user_id'),
            'category_id' => $this->request->getPost('category_id'),
        ];

        $blogModel->insert($data);

        return redirect()->to('/blogs');
    }

    public function edit($id)
    {
        $blogModel = new BlogModel();
        $categoryModel = new CategoryModel();

        $data['blog'] = $blogModel->find($id);
        $data['categories'] = $categoryModel->findAll();

        return view('blogs/edit', $data);
    }

    public function update($id)
    {
        $blogModel = new BlogModel();

        $data = [
            'title'       => $this->request->getPost('title'),
            'content'     => $this->request->getPost('content'),
            'category_id' => $this->request->getPost('category_id'),
        ];

        $blogModel->update($id, $data);

        return redirect()->to('/blogs');
    }

    public function delete($id)
    {
        $blogModel = new BlogModel();
        $blogModel->delete($id);

        return redirect()->to('/blogs');
    }

    public function show($id)
    {
        $blogModel = new BlogModel();
        $data['blog'] = $blogModel->find($id);

        return view('blogs/show', $data);
    }
}
