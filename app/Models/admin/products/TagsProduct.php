<?php

namespace App\Models\admin\products;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagsProduct extends Model
{
    protected $fillable = ['name', 'status', 'slug'];
    protected $table = 'tags_products';
    protected $primaryKey = 'id';
    use HasFactory;
    public function products(){
        return $this->belongsToMany(Product::class,'pivot_tags_product', 'tag_id','product_id')->withPivot('tag_id');
    }
}
