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
}
