<?php

namespace App\Models\admin\blogs;

use App\Models\Customer;
use App\Models\PostComment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['name','image','slug','status','short_description','description','author'];
    public function categories(){
        return $this->belongsToMany(CategoryPost::class,'pivot_categories_post','post_id','category_post_id')->withPivot('post_id');
    }
    public function tags(){
        return $this->belongsToMany(TagPost::class,'pivot_tags_post','post_id','tag_post_id')->withPivot('post_id');
    }
    // public function cus(){
    //     return $this->hasOne(Customer::class,'id','customer_id');
    // }
    public function comments(){
        return $this->hasMany(PostComment::class,'blog_id','id')->where('reply_id',0)->orderBy('id','DESC');
    }

}
