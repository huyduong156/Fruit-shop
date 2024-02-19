<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompareModel extends Model
{
    use HasFactory;
    protected $table='compare_product';
    protected $fillable = ['customer_id','product_id'];
    public function product(){
        return $this->hasOne(Product::class,'id','product_id');
    }
}
