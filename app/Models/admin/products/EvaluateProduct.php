<?php

namespace App\Models\admin\products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluateProduct extends Model
{
    protected $fillable = ['product_id', 'customer_id', 'content', 'star', 'status'];
    protected $table = 'product_evaluate';
    protected $primaryKey = 'id';
    use HasFactory;
}
