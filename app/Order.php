<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = [
    'first_name','second_name','address','city','zipCode','phoneNumber','cart_id','subTotal','commend','User_id'
    ];

    public function cart(){
        return $this->belongsTo(Cart::class);
    }

    public function User(){
        return $this->belongsTo(User::class);
    }
}
