<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'author_id', 'category_id', 'image_path'];

    // Relationships
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
