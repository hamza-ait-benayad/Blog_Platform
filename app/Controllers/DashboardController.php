<?php

namespace App\Controllers;

use App\Models\BlogModel;
use App\Models\CategoryModel;

class DashboardController extends BaseController
{
    public function index(): string
    {
        $blogModel = new BlogModel();
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->getAllCategories();

        $perPage = 1;

        $blogs = $blogModel->getAllBlogs()->paginate($perPage, 'default');
        $pager = $blogModel->pager;

        return view('dashboard', [
            'blogs' => $blogs,
            'pager' => $pager,
            'categories' => $categories
        ]);
    }

    public function myBlogs(): string
    {
        $blogModel = new BlogModel();

        $perPage = 10;

        $userId = session()->get('user_id');
        $blogs = $blogModel->getMyBlogs($userId)->paginate($perPage, 'default');
        $pager = $blogModel->pager;

        return view('dashboard', [
            'blogs' => $blogs,
            'pager' => $pager
        ]);    
    }
    
    public function getBlogsByCategory($categoryId): string
    {
        $blogModel = new BlogModel();
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->getAllCategories();

        $perPage = 10;

        $blogs = $blogModel->getBlogsByCategory($categoryId)->paginate($perPage, 'default');
        $pager = $blogModel->pager;

        return view('dashboard', [
            'blogs' => $blogs,
            'pager' => $pager,
            'categories' => $categories
        ]);
    }
}
