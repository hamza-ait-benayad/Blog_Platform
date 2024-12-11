<?php

namespace App\Controllers;

use App\Models\BlogModel;
use App\Models\CategoryModel;
use CodeIgniter\Controller;

class BlogController extends Controller
{

    public function create()
    {
        $categoryModel = new CategoryModel();
        $data['categories'] = $categoryModel->findAll();
        return view('blogs/create', $data);
    }

    public function store()
    {
        $rules = [
            'title'       => 'required|min_length[3]|max_length[255]',
            'content'     => 'required|min_length[10]',
            'category_id' => 'required|is_natural_no_zero',
            'image'       => 'permit_empty|is_image[image]|max_size[image,2048]|mime_in[image,image/jpg,image/jpeg,image/png]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $blogModel = new BlogModel();
        $image = $this->request->getFile('image');
        $imagePath = null;

        if ($image && $image->isValid()) {
            $imageName = $image->getRandomName();
            $image->move(FCPATH . 'uploads/blogs', $imageName);
            $imagePath = 'uploads/blogs/' . $imageName;
        }

        $data = [
            'title'       => $this->request->getPost('title'),
            'content'     => $this->request->getPost('content'),
            'user_id'     => session()->get('user_id'),
            'category_id' => $this->request->getPost('category_id'),
            'image_path'  => $imagePath,
        ];

        $blogModel->insert($data);

        return redirect()->to('/')->with('success', "Blog created successfully");
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
    $validation = \Config\Services::validation();

    $rules = [
        'title'       => 'required|min_length[3]|max_length[255]',
        'content'     => 'required|min_length[10]',
        'category_id' => 'required|is_not_unique[categories.id]',
        'image'       => 'permit_empty|is_image[image]|max_size[image,2048]|mime_in[image,image/jpg,image/jpeg,image/png]',
    ];

    if (!$this->validate($rules)) {
        return redirect()->back()->withInput()->with('errors', $validation->getErrors());
    }

    $blog = $blogModel->find($id);
    if (!$blog) {
        return redirect()->to('/myBlogs')->with('error', 'Blog not found.');
    }

    $data = [
        'title'       => $this->request->getPost('title'),
        'content'     => $this->request->getPost('content'),
        'category_id' => $this->request->getPost('category_id'),
    ];

    $image = $this->request->getFile('image');
    if ($image && $image->isValid()) {
        if ($blog['image_path'] && file_exists(FCPATH . $blog['image_path'])) {
            unlink(FCPATH . $blog['image_path']);
        }

        $imageName = $image->getRandomName();
        $image->move(FCPATH . 'uploads/blogs', $imageName);

        $data['image_path'] = 'uploads/blogs/' . $imageName;
    }

    $blogModel->update($id, $data);

    return redirect()->to('/myBlogs')->with('success', 'Blog updated successfully');
}


    public function delete($id)
    {
        $blogModel = new BlogModel();
        $blogModel->delete($id);

        return redirect()->to('/')->with('success', 'blog removed successfully');
    }

    public function show($id)
    {
        $blogModel = new BlogModel();
        $data['blog'] = $blogModel->getBlogById($id);

        if ($data['blog'] !== null) {
            return view('blogs/show', $data);
        } else {
            return redirect()->to('/')->with('errors', ["Cannot find any blog."]);
        }
    }

    public function myBlogs()
    {
        $userId = session()->get('user_id');

        $blogModel = new BlogModel();
        $data['blogs'] = $blogModel->where('user_id', $userId)->findAll();

        return view('blogs', $data);
    }
}
