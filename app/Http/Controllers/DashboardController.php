<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Blog;

class DashboardController extends Controller
{
    public function index() {
        $blogItems = Blog::all();
        
        return view('/dashboard/dashboard', compact('blogItems'));
    }

    public function createBlog() {
        $categories = Category::all();
        return view('/dashboard/blog/create', compact('categories'));
    }

    public function updateBlog($id) {
        $blog = Blog::find($id);
        $categories = Category::all();
        
        return view('/dashboard/blog/edit', compact('blog', 'categories'));
    }
}
