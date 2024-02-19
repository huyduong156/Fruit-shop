<?php

namespace App\Models\admin\blogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagPost extends Model
{
    use HasFactory;
    protected $table = 'tags_post';
    protected $fillable = ['name','status','slug'];
    public function posts(){
        return $this->belongsToMany(Post::class,'pivot_tags_post','tag_post_id','post_id')->withPivot('tag_post_id');
    }
}
