<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $publishedNews = 7;
        $pendingNews = 10;
        $categories = 4;
        $roles = 3;
        $permissions = 10;

        return view('admin.dashboard.index', compact('publishedNews', 'pendingNews', 'categories', 'roles', 'permissions'));
    }
}
