<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{

    public function show($id) {
        $blog = Blog::findOrFail($id);

        return view("/dashboard/blog/view", compact("blog"));
    }

    public function create(Request $request) {
        $this->validate($request, [
            "title" => "required",
            "content" => "required",
            "category_id" => "nullable|exists:categories,id",
            "image" => "nullable|image|mimes:jpeg,png,jpg,gif|max:2048"
        ]);
        
        $data = [
            'title' => $request->title,
            'content' => $request->content,
            'author_id' => auth()->id()
        ];
        
        // Add category_id if provided
        if ($request->has('category_id')) {
            $data['category_id'] = $request->category_id;
        }
        
        // Handle image upload if present
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('blog_images'), $imageName);
            $data['image_path'] = 'blog_images/' . $imageName;
        }
        
        $blog = Blog::create($data);
        
        return redirect()->route('show.blog', $blog->id)->with('success', 'Blog created successfully');
    }
    
    public function update(Request $request, $id) {
        $this->validate($request, [
            "title" => "required",
            "content" => "required",
            "category_id" => "nullable|exists:categories,id",
            "image" => "nullable|image|mimes:jpeg,png,jpg,gif|max:2048"
        ]);
        
        $blog = Blog::findOrFail($id);
        
        if ($blog->author_id !== auth()->id()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }
        
        $data = [
            'title' => $request->title,
            'content' => $request->content
        ];
        
        // Add category_id if provided
        if ($request->has('category_id')) {
            $data['category_id'] = $request->category_id;
        }
        
        // Handle image upload if present
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($blog->image_path && File::exists(public_path($blog->image_path))) {
                File::delete(public_path($blog->image_path));
            }
            
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('blog_images'), $imageName);
            $data['image_path'] = 'blog_images/' . $imageName;
        }
        
        $blog->update($data);
        
        return redirect()->route('show.blog', $blog->id)->with('success', 'Blog updated successfully');
    }
    
    public function delete($id) {
        $blog = Blog::findOrFail($id);
        
        if ($blog->author_id !== auth()->id()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }
        
        $blog->delete();
        
        return redirect()->route('dashboard', $blog->id)->with('success', 200);
    }
}