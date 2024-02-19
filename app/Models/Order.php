<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'customer_id',
        'status',
        'token'
    ];
    public function customer(){
        return $this->hasOne(Customer::class,'id','customer_id');
    }
    public function details(){
        return $this->hasMany(OrderDetail::class,'order_id','id');
    }
}
