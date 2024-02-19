<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $fillable = ['customer_id','product_id'];
    use HasFactory;
    public function prod(){
        return $this->hasOne(Product::class,'id','product_id');
    }
}
