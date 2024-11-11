<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use CodeIgniter\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $categoryModel = new CategoryModel();
        $data['categories'] = $categoryModel->findAll();

        return view('categories/index', $data);
    }

    public function create()
    {
        return view('categories/create');
    }

    public function store()
    {
        $categoryModel = new CategoryModel();

        $data = [
            'name' => $this->request->getPost('name'),
        ];

        $categoryModel->insert($data);

        return redirect()->to('/categories');
    }

    public function edit($id)
    {
        $categoryModel = new CategoryModel();
        $data['category'] = $categoryModel->find($id);

        return view('categories/edit', $data);
    }

    public function update($id)
    {
        $categoryModel = new CategoryModel();

        $data = [
            'name' => $this->request->getPost('name'),
        ];

        $categoryModel->update($id, $data);

        return redirect()->to('/categories');
    }

    public function delete($id)
    {
        $categoryModel = new CategoryModel();
        $categoryModel->delete($id);

        return redirect()->to('/categories');
    }
}
