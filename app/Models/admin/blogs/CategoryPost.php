<?php

namespace App\Models\admin\blogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryPost extends Model
{
    use HasFactory;
    protected $table = 'categories_post';
    protected $fillable = ['name','status','description','slug'];
    public function posts(){
        return $this->belongsToMany(Post::class,'pivot_categories_post','category_post_id','post_id')->withPivot('category_post_id');
    }
}
