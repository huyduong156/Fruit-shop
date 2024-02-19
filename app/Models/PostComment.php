<?php

namespace App\Models;

use App\Models\admin\blogs\Post;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostComment extends Model
{
    use HasFactory;
    protected $table = 'comment_blog';
    protected $fillable = ['reply_id','blog_id','customer_id','content','status'];
    public function cus(){
        return $this->hasOne(Customer::class,'id','customer_id');
    }
    public function post(){
        return $this->hasOne(Post::class,'id','blog_id');
    }
    public function replies(){
        return $this->hasMany(PostComment::class,'reply_id','id');
    }
}
