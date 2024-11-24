<?php

namespace App\Controllers;

use App\Models\BlogModel;

class DashboardController extends BaseController
{
    public function index(): string
    {
        $blogModel = new BlogModel();
        $dataBlog['blogs'] = $blogModel->getAllBlogs();
        return view('dashboard', $dataBlog);
    }

    public function myBlogs(): string
    {
        $userId = session()->get('user_id');

        $blogModel = new BlogModel();
        $data['blogs'] = $blogModel->getMyBlogs($userId);
    
        return view('dashboard', $data);
    }
}
